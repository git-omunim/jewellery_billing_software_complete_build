// Verify.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include "iostream"
#include "NBioAPI.h"
#include "NBioAPI_Export.h"
#include <dirent.h>
#include <stdio.h>
#include <string.h>
using namespace std;


int main(int argc, const char* argv[])
{
DIR *dir;
std::string sFilePath;
NBioAPI_HANDLE          handleOfNBioAPI;
NBioAPI_EXPORT_DATA     ExportData;
NBioAPI_UINT8*          FIRTemplate=NULL;
NBioAPI_UINT32          TemplateLen;
struct dirent *ent;
NBioAPI_RETURN nRet;


// Module Initialize.
nRet = NBioAPI_Init(&handleOfNBioAPI);
//if error give message
if (NBioAPIERROR_NONE != nRet)  {
      cout << "Error has occured while initialization";
	  return 0 ;
   }else{

//if initialization success open device
nRet = NBioAPI_OpenDevice(handleOfNBioAPI, NBioAPI_DEVICE_ID_AUTO);
if(NBioAPIERROR_NONE != nRet){
cout << "Error to open Device! Please connect Device... ";
return 0;
}
//capture 
NBioAPI_FIR_HANDLE hCaptured;		  
nRet = NBioAPI_Capture(handleOfNBioAPI, NBioAPI_FIR_PURPOSE_VERIFY, &hCaptured, -1, NULL, NULL);

//get FIR from handle to compare with stored FIR
NBioAPI_INPUT_FIR inputFIR;
inputFIR.Form = NBioAPI_FIR_FORM_HANDLE;
inputFIR.InputFIR.FIRinBSP = &hCaptured;

//path FOR folder where all .min files are stored
const char* sCommonPathUsedToSaveFiles = argv[1];

//check folder exist
if ((dir = opendir (sCommonPathUsedToSaveFiles)) != NULL)
{
	//if folder exist iterate over all .min files from given folder
	while ((ent = readdir (dir)) != NULL)
  {
	  std::string sFileName = ent->d_name;
	  std::string sSearch = "min";
	  sFilePath = sCommonPathUsedToSaveFiles;
	  std::size_t find = sFileName.find(sSearch);
	  if(find > 0)
      {
	    sFilePath.append(sFileName);
        FILE* fp;
        fopen_s(&fp, sFilePath.c_str(), "rb"); 
        if (fp)  
	    {
         fseek(fp, 0L, SEEK_END);
         TemplateLen = ftell(fp);
         fseek(fp, 0L, SEEK_SET);

         if (FIRTemplate)
            delete[] FIRTemplate;

          FIRTemplate = new NBioAPI_UINT8[TemplateLen];

          fread(FIRTemplate, TemplateLen, 1, fp);
          fclose(fp);
		  if (FIRTemplate == NULL || TemplateLen == 0)  {
              return 0;
              }

             MINCONV_DATA_TYPE type = MINCONV_TYPE_FDP;
             NBioAPI_FIR_HANDLE hProcessedFIR;
		     //FDX data Convert FIR data
              NBioAPI_RETURN nRet = NBioAPI_FDxToNBioBSP(handleOfNBioAPI, FIRTemplate, TemplateLen, type, NBioAPI_FIR_PURPOSE_VERIFY, &hProcessedFIR);
               if (NBioAPIERROR_NONE == nRet)  
	           {
                 NBioAPI_INPUT_FIR storedFIR;
                 NBioAPI_BOOL bResult;

                 storedFIR.Form = NBioAPI_FIR_FORM_HANDLE;
                 storedFIR.InputFIR.FIRinBSP = &hProcessedFIR;

				 nRet = NBioAPI_VerifyMatch(handleOfNBioAPI,&inputFIR,&storedFIR,&bResult,NULL);
                 if (NBioAPIERROR_NONE == nRet)  
	             {
                     if (NBioAPI_FALSE != bResult)
			         {
				           cout<< "Matched Files Name Is :" << sFileName.c_str(); 
						   return 0;	
			               break;
			         }else
			         {
				      continue;
                     }
	            }else {
                   cout<< "No Match Found!"; 
				   return 0;
                }
			   // Close Device
			   NBioAPI_CloseDevice(handleOfNBioAPI, NBioAPI_DEVICE_ID_AUTO);
			  //FIR Handle Free
               NBioAPI_FreeFIRHandle(handleOfNBioAPI, hProcessedFIR);
        }else{
        cout<< "Error occured in data conversion";    
		return 0;
		}
}//check file else
}//if end
}//while end  
}//if end
}
	return 0;
}

