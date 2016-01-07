//=================== OS-2-Project ============================
// SERVER Site
// + Receive Data (Question) from the Client Site
// + Send Data (Answer) to the Client Site
//===============================================================

import java.net.*;
import java.io.*;

//===============================================================
// * creates instances of InServer and OutServer
//================================================================
public class Server {

   static int Data_Port = 10300;  // to Receive QUESTION from the Client

 public static void main (String args[]) {

   InServer IP_Server  = new InServer (Data_Port);

  }

} // END of the SERVER class


//==================================================================
// * class creates a OutServer socket for SENDING data TO the CLIENT
//==================================================================
class OutServer implements Runnable {

	ServerSocket server = null;      //Instance of ServerSocket
	Socket socket = null;            //The actual socket used for SENDING data

	PrintStream stream = null;       //A PrintStream is used for SENDING data

	DataInputStream inStream = null; //A DataInputStream is used for reading file name
	int thePort;                     //Port number
	String Confirm;
	Thread thread;                   //A seperate thread is used to wait for a socket accept

   /*
    * constructor starts the thread
    * @param port - the port to listen to
    */
   public OutServer (int port,String Confirm) {
      thePort = port;
		this.Confirm = "Confirmation Number Is"+Confirm;
      thread = new Thread (this);
      thread.start ();
   }

   /*
    * the thread that waits for socket
    * connections and SENDs data from a FILE to the CLIENT
    */
   public void run () {

      // Create a ServerSocket
      //.......................................
      try {
                   server = new ServerSocket (thePort);
					System.out.println ("OPEN a socket for SENDING data TO the CLIENTat port " + thePort);
      }
      catch (Exception e) {
         System.out.println (e);
         System.exit (1);
      }

		try {
			socket = server.accept ();
			System.out.println ("Connected to port : " + thePort + " WAITING for the Answer ...");
		}
		catch (Exception e) {
				System.out.println (e);
				System.exit (1);
			}

         String name = null;
        try {

			System.out.println("Getting Output Stream");
            stream = new PrintStream (socket.getOutputStream ());
         }
         catch (Exception e) {
            System.out.println (e);
            break;
         }

			stream.println ("213124");

         try {
            //fs.close ();
            System.out.println ("   Reading file " + Confirm + " and SENDING it,done.");
            socket.close ();
            System.out.println ("Connection closed at port : " + thePort);
         }
         catch (IOException e) {
            System.out.println (e);
         }

   }
   

public int ReadFlag (String FileName) {

    int ReturnValue=0;

  // OPEN the given File 
  //.........................................................

              FileInputStream ReadFile = null;

                try {
                   ReadFile = new FileInputStream (FileName);
                }

                catch (Exception e) {
	               System.out.println (e);
	               //System.exit (1);
                 }

    // READ the file
    //..................................................................

             DataInputStream ds = new DataInputStream (ReadFile);
             
              try {
                      String s = ds.readLine (); // Read Data from the given File
						System.out.println (ds);
               	          //System.exit (1);
                      
                  }
              catch (IOException e) {
                          System.out.println (e);
		          //System.exit (1);
                  }

      //Close File

      try {
            ReadFile.close ();
      }
      catch (IOException e) {
            System.out.println (e);
      }

                System.out.println ("Flag Value = "+ ReturnValue);

      return ReturnValue;
   } // end of FUNCTION
   
   
}   // END of OutServer class


//================================================================
// * class creates a server socket for RECEIVING data from
// * the client
//=================================================================
class InServer implements Runnable {

   ServerSocket server = null;    //Instance of ServerSocket
   Socket socket = null;          //The actual socket used for RECEIVING data

   int thePort;                   //Port number
   Thread thread;                 //A seperate thread is used to wait for a socket accept

   String fnameSI = "INCOMING.dat";      // Name of the File (by default) containning I_data at Server

   DataInputStream stream = null; //A DataInputStream is used for RECEIVING data

   /*
    * constructor starts the thread
    * @param port - the port to listen to
    */
   public InServer (int port) {

      thePort = port;
      thread = new Thread (this);
      thread.start ();
   }

   /*
    * the thread that waits for socket
    * connections and RECEIVES data from the client
    */
   public void run () {

      // Create a ServerSocket
      //.......................................
      try {
         server = new ServerSocket (thePort);
         System.out.println ("OPEN a socket for RECEIVING data from the CLIENT at port " + thePort);
      }
      catch (Exception e) {
         System.out.println (e);
         System.exit (1);
      }

      while (true) {
         try {
            socket = server.accept ();
            System.out.println ("Connected to port : " + thePort);
         }
         catch (Exception e) {
            System.out.println (e);
            System.exit (1);
         }

         // Accept file name "name" from the Client
         // ( Client tells WHICH FILE it wants to WRITE )
         //...............................................................
         String name = null;
         try {
            // Prepare a stream for RECEIVING
            stream = new DataInputStream (socket.getInputStream ());

            //Get File name from the CLIENT
            name = stream.readLine ();
			System.out.println("Look "+name);
            if (name == null) name = fnameSI;
         }
         catch (Exception e) {
            System.out.println (e);
            break;
         }

		String[] var = name.split(":");
				int out_port = Integer.parseInt(var[1]);
				int Client_id = Integer.parseInt(var[0]);
				int acc_no = Integer.parseInt(var[2]);
		
		 Thread thread = new Thread("New Thread") {
			  public void run(){
				
					new OutServer (out_port,"confirmation_number"); 
			  }
			};


   thread.start(); 
		 
		 
		 
         // Open the given FILE
         //........................................................
         // FileOutputStream wf = null;
         // try {
            // wf = new FileOutputStream (name);
         // }
         // catch (Exception e) {
            // System.out.println (e);
            // System.exit (1);
         // }
		

         // Read Data from the "stream" and WRITE it to the given File
         //...........................................................

         // PrintStream ds = new PrintStream (wf); // Why do we need this ???
         // while (true) {
            // try {
               // String s = stream.readLine ();
               // if (s == null) break;
               // ds.println (s); // Why not just fs.println (s); ???
            // }
            // catch (IOException e) {
               // System.out.println (e);
               // break;
            // }
        // }


		System.out.println ("   RECEIVING and writing data to file " + name +", done.");

         try {
            //wf.close ();
            socket.close ();
            System.out.println ("Connection closed at port : " + thePort + " and Continue to LISTEN ...");
         }
         catch (IOException e) {
            System.out.println (e);
         }
      }
   }
   

   
} // END of CLASS InServer


