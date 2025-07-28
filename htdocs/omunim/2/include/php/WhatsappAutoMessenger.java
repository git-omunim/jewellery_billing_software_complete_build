/**
 * @author Varun Kumar <varunon9@gmail.com>
 */

/**
 * Execute this script from terminal. After 5 seconds, message will start getting typed and sent.
 * You can see message being typed and sent on terminal. To send it to your friend on whatsapp web, just 
 * click on inputDiv (div for typing message on whatsapp web).
 */

import java.util.*;

public class WhatsappAutoMessenger {

	public static void main(String args[]) {


		MouseKeyboardControl mouseKeyboardControl = new MouseKeyboardControl();
		Timer timer = new Timer();

		timer.schedule(new TimerTask() {

			public void run() {


				// simulate enter key to send message
				mouseKeyboardControl.typeCharacter('\n');
				timer.cancel();
				timer.purge();
				
			}
		}, 15000); // 5000ms delay and 5000ms repeat period
		
	}
}
