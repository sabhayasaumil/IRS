import java.awt.*;
import java.io.*;
import java.net.*;


public class Client {
	
	int Port_to_Server = 10300;
	int Port_from_Server;
	
	boolean isConnect = false;
	String send,send1;
	int cust_id;
	//String ServerName = "2604:2000:2b80:1400:e0f9:d20f:593a:2dc";
	String ServerName = "ebz.cs.newpaltz.edu";
	String output = "tax_out.dat";
	Socket fs = null;
	
	
	public Client(int cust_id, int port, String send, String send1)
	{
		this.Port_from_Server = port;
		// System.out.println(Port_from_Server);
		this.cust_id = cust_id;
		this.send = send;
		this.send1 = send1;
		System.out.println(send1);
		//System.exit(1);
		process_send();
		receive();
	}
	
	public boolean Connect (int port, String hostName) {

      if (isConnect) Disconnect ();

      try {
         fs = new Socket (hostName, port);
      }
      catch (Exception e) {
         System.out.println (" Unable to open Input-Port socket at : " +hostName +port);
         return false;
      }

      System.out.println  (" Connected to " + hostName + " at port: " +port);
      isConnect = true;
      return true;
   }	
		
		
		
	public void Disconnect () {

		  if (isConnect) {
			 try {
				fs.close ();
			 }
			 catch (IOException e) {
				   System.out.println ("Exception caught closing socket.");
			  }
			 System.out.println  (" Disconnected ");
			 isConnect = false;
		  }
	   }
   
	 public void process_send()
	 {
	 FileInputStream ReadFile = null;
	 try {
				//ReadFile = new FileInputStream (input);

			 

		if (!Connect (Port_to_Server,ServerName)) {
			 System.out.println (" No connection to server.");
			 System.exit (1);
			}
			PrintStream streamOut = null; // stream from the Client to the socket
			streamOut = new PrintStream (fs.getOutputStream());
			//streamOut.println (input);
			//DataInputStream ds = new DataInputStream (ReadFile);
			//streamOut.println (cust_id+"::"+Port_from_Server+"::"+send+"::");
			streamOut.println (cust_id);
			streamOut.println (Port_from_Server);
			streamOut.println (send);
			streamOut.println (send1);
			//System.out.println(send1);
			// while (true) {
				// String s = ds.readLine (); // Read Data from the given File
				// if (s == null) break;
				// streamOut.println (s); // SEND it to the "streamOut"
			// }
			
			// streamOut.println (send);
			
			// try {
				// ds.close ();
			// }
			// catch (IOException e) {
				// System.out.println (e);
			// }
			
		  
		  System.out.println(" SENT File B2B.conf to the Server" + ServerName + " at port : " + Port_to_Server);
		  Disconnect ();
		  System.out.println(" DONE. ");
		}
		catch (Exception e) {
				Disconnect();
				e.printStackTrace();
				System.out.println (e);
				System.exit (1);
			}
	} 
 
   
	public void receive()
	{
		DataInputStream streamIn = null; // stream from the Client to the socket
		PrintStream streamOut = null;
		if (!Connect (Port_from_Server,ServerName)) {
			System.out.println (" No connection to server.");
			System.exit (1);
		}
		try {
			streamIn = new DataInputStream (fs.getInputStream());
			streamOut = new PrintStream (fs.getOutputStream());
		}
		catch (Exception e) {
			System.out.println (e);
			Disconnect();
			System.exit (1);
		}
			BufferedWriter br ;// = new BufferedWriter(new FileWriter(output));
			//FileOutputStream wf = null;
			// try {
				// br = new BufferedWriter(new FileWriter(output));
				//wf = new FileOutputStream (output);
			// }

			// catch (Exception e) {
				// System.out.println (e);
				// System.exit (1);
			// }
		
		
		
			//PrintStream ds = new PrintStream (wf); // Why do we need this ???
			try {
					br = new BufferedWriter(new FileWriter(output));
					while (true) {
						try {
							String s = streamIn.readLine ();
								if (s == null) break;
									br.write(s);
									//ds.println (s); 
							}	
						catch (IOException e) {
								System.out.println (e);
						break;
						}
					}
					br.close ();
			}
			catch (Exception e) {
				System.out.println (e);
				System.exit (1);
			}
			//Close File

			// try {
				// br.close ();
			// }

			// catch (IOException e) {
			// System.out.println (e);
			// }
			
		System.out.println (" RECEIVING data from the Server at port : " + Port_from_Server + " and write it to File " + output + " at port : " +output);
		Disconnect ();
		System.out.println (" DONE.");
		
	}

	
	public static void main (String args[]) {
		try
		{
			
				BufferedReader br = new BufferedReader(new FileReader("b2b.conf"));
                String s;
                int Value = 0;
				
				s = br.readLine();
				String[] id = s.split(":");
				int cust_id = Integer.parseInt(id[1]);
				
				s = br.readLine();
				id = s.split(":");
				int port = Integer.parseInt(id[1]);
				
				s = br.readLine();
				id = s.split(":");
				String bank_name = id[1];
				
				s = br.readLine();
				id = s.split(":");
				String debit = id[1];
				
				s = br.readLine();
				id = s.split(":");
				String ship = id[1];
				
				s = br.readLine();
				id = s.split(":");
				String ship_met = id[1];
				
				s = br.readLine();
				id = s.split(":");
				String address = id[1];
				
				s = br.readLine();
				id = s.split(":");
				int amount = 10 + 9 * Integer.parseInt(id[1])/100;
				if(ship_met.equals("priority"))
					amount = amount + 10;
				
				String writer = "%$%0"+cust_id+"%$%"+amount+"%$%"+"B2B"+"%$%"+System.currentTimeMillis()+"%$%"+"B2B"+"%$%"+bank_name+"%$%"+debit+"%$% %$%"+ship+"%$%"+ship_met+"%$%"+address+"%$% $%$";
				String writer_2 = "%$%0"+cust_id+"%$%"+amount+"%$%"+bank_name+"%$%"+debit+"%$%"+ship+"%$%"+ship_met+"%$%"+address+"$%$";
				String send = writer+"::"+writer_2;
       new Client (cust_id,port,writer, writer_2);
		}
		catch(Exception e)
		{
			e.printStackTrace();
			
		}
	} 
		
}