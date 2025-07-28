// Capture.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include "iostream"
#include "NBioAPI.h"
#include "NBioAPI_Export.h"
#include "string.h"
//#include "NBioAPI_CheckValidity.h"
using namespace std;

int main(int argc, char* argv[])
{
NBioAPI_HANDLE          handleOfNBioAPI;
NBioAPI_EXPORT_DATA     ExportData;

// Module Initialize.
   NBioAPI_RETURN nRet = NBioAPI_Init(&handleOfNBioAPI);
   if (NBioAPIERROR_NONE != nRet)  {
      cout <<"Some Error has occured while initialization";
   }else{
	   //NBioAPI_RETURN nRet = NBioAPI_CheckValidity("NBioBSP.dll");
	   NBioAPI_DEVICE_ID deviceID = NBioAPI_GetOpenedDeviceID(handleOfNBioAPI); 
    //NBioAPI Open Device
      nRet = NBioAPI_OpenDevice(handleOfNBioAPI, NBioAPI_DEVICE_ID_AUTO);
      if (NBioAPIERROR_NONE == nRet){
            NBioAPI_FIR_HANDLE hCaptured;	
		    //NBioAPI Capture.
            nRet = NBioAPI_Capture(handleOfNBioAPI, NBioAPI_FIR_PURPOSE_VERIFY, &hCaptured, -1, NULL, NULL);

            if (NBioAPIERROR_NONE == nRet)  {
                MINCONV_DATA_TYPE type = MINCONV_TYPE_FDP;
                NBioAPI_INPUT_FIR inputFIR;	//FIR Information.
			
                memset(&ExportData, 0, sizeof(NBioAPI_EXPORT_DATA));
			
                inputFIR.Form = NBioAPI_FIR_FORM_HANDLE;
                inputFIR.InputFIR.FIRinBSP = &hCaptured;

				//FIR Data Convert to FDX Data
                nRet = NBioAPI_NBioBSPToFDx(handleOfNBioAPI, &inputFIR, &ExportData, type);

                if (NBioAPIERROR_NONE == nRet)  {
                   const char *sDirCommonPath = argv[1];
                   FILE *fp;
	               fopen_s(&fp,sDirCommonPath,"wb");
	               if (fp!=NULL)  {
                    fwrite(ExportData.FingerData2[0].Template[0].Data, ExportData.FingerData2[0].Template[0].Length, 1, fp);
                    fclose(fp);
                    }else {
				   cout <<"error to save";
			        }
                }else{
				cout<<"FIR data conversion fails";
				return 0;
		   	}
			//FIR Handle Free
         NBioAPI_FreeFIRHandle(handleOfNBioAPI, hCaptured);
        }else {
          cout<<"Capture process failed";
	      return 0;
         }
	 // Close Device.
      NBioAPI_CloseDevice(handleOfNBioAPI, NBioAPI_DEVICE_ID_AUTO);
   }else{
      cout<<"Device open failed! Please connect Device.";
	  return 0;   
   }
 }
cout<<"Success";
return 0;
}

