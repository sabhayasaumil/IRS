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

}


class OutServer implements Runnable {

	ServerSocket server = null;      //Instance of ServerSocket
	Socket socket = null;            //The actual socket used for SENDING data

	PrintStream stream = null;       //A PrintStream is used for SENDING data

	DataInputStream inStream = null; //A DataInputStream is used for reading file name
	int thePort;                     //Port number
	String writer, writer_2;
	Thread thread;                   //A seperate thread is used to wait for a socket accept

   public OutServer (int port,String writer , String writer_2) {
		thePort = port;
		this.writer = writer;
		this.writer_2 = writer_2;
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
            //break;
         }
		String pid = "";
		StringBuilder data = new StringBuilder("");
		 try
		 {
			BufferedReader br = new BufferedReader(new FileReader("/data/payment_history.txt"));
			String s = null;
			int length = 0;
			while((s = br.readLine())!= null)
			{
				data.append(s);
				
			}
			length = data.toString().split("\\$%\\$").length;
			
			if(length < 10)
			pid = "0330";
			else
			pid = "033";
			pid = pid+length;
			
			BufferedWriter bw = new BufferedWriter(new FileWriter("/data/payment_history.txt",true));
			bw.append(pid+writer+"\n");
			bw.close();
			BufferedWriter bs = new BufferedWriter(new FileWriter("/data/payment.txt",true));
			bs.append(pid+writer_2+"\n");
			bs.close();
		 }
		 catch(Exception e)
		 {
			e.printStackTrace(); 
			 
		 }
		 
		stream.println (pid);

		try
		{
			socket.close ();
		}
		catch(Exception e)
		{
			e.printStackTrace();
			
		}
		
         try {
            //fs.close ();
            System.out.println (" Confirmation Number " + pid + " and SENDING it,done.");
            
			server.close();
            System.out.println ("Connection closed at port : " + thePort);
			new payconf();
         }
         catch (IOException e) {
            System.out.println (e);
         }
		 
		 
		
   }
     
}


class InServer implements Runnable {

   ServerSocket server = null;    //Instance of ServerSocket
   Socket socket = null;          //The actual socket used for RECEIVING data

   int thePort;                   //Port number
   Thread thread;                 //A seperate thread is used to wait for a socket accept

   String fnameSI = "INCOMING.dat";      // Name of the File (by default) containning I_data at Server

   DataInputStream stream = null; //A DataInputStream is used for RECEIVING data

   public InServer (int port) {

      thePort = port;
      thread = new Thread (this);
      thread.start ();
   }


   public void run () {

      // Create a ServerSocket
      //.......................................
		int ijk=0;
		int j =0;
		String write = "";
		String write_2 = "";
		
		
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
            //System.exit (1);
         }

        
		try {
            // Prepare a stream for RECEIVING
            stream = new DataInputStream (socket.getInputStream ());

            //Get File name from the CLIENT
            ijk = Integer.parseInt(stream.readLine ());
			j = Integer.parseInt(stream.readLine ());
			System.out.println(j);
			write = stream.readLine();
			write_2 = stream.readLine();
			// System.out.println(name);

         }
         catch (Exception e) {
            System.out.println (e);
            //break;
         }
			int i = 0;
			// for(String s: name.split("::"))
				// System.out.println((++i)+s);
		 // System.out.println((++i)+"--->"+ijk);
		 // System.out.println((++i)+"--->"+j);
		 // System.out.println((++i)+"--->"+write);
		 // System.out.println((++i)+"--->"+write_2);
		// String[] var = name.split("::");
				// int out_port = Integer.parseInt(var[1]);
				// int Client_id = Integer.parseInt(var[0]);
				// String writer = var[2];
				// String writer_2 = var[3];
		int Client_id = ijk;
		int out_port = j;
		String writer = write;
		String writer_2 = write_2;
        String name = "";
		 Thread thread = new Thread("New Thread") {
			  public void run(){
				
					new OutServer (out_port,writer, writer_2); 
			  }
			};


   thread.start(); 
		 
		System.out.println ("   RECEIVING  data from port " + 10300 +", done.");

         try {
            socket.close ();
            System.out.println ("Connection closed at port : " + thePort + " and Continue to LISTEN ...");
         }
         catch (IOException e) {
            System.out.println (e);
         }
      }
   }
}


