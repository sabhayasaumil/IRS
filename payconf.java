import java.net.*;
import java.io.*;
// import fake.*;
// import npz.*;
import java.awt.*;

public class payconf
{
	public payconf()
		{
			try
			{
					BufferedReader bw = new BufferedReader(new FileReader("/data/payment.txt"));
					String s = null;
					String start = null;
					String bank_conf = "";
					String ship_conf = "  ";
					StringBuilder sb = new StringBuilder("");
					start = bw.readLine();
					start = start+'\n';
						while((s = bw.readLine()) != null)
						{
							sb.append(s);
						}

						
					for(String k: sb.toString().split("\\$%\\$"))	
					{
						if(!k.trim().matches("[ ]*"))
						{
							String ss = k.trim();
							StringBuilder sk = new StringBuilder("");
							String bb[] = ss.split("%\\$%");
							String id = bb[0];
							if(bb[3].trim().equals("npz"))
							{
								sk.append("saumil:zxcvbn:"+bb[0]+":1430163259:"+bb[4]+":"+bb[2]);
								BufferedWriter bbx = new BufferedWriter(new FileWriter("/npz/bankRequest.dat"));
								bbx.write(sk.toString());
								bbx.close();
								
								new ClientNPZ(null);
								
								try
								{
									BufferedReader bank_rep = new BufferedReader(new FileReader("/npz/bankReply.dat"));
									StringBuilder sbcd = new StringBuilder("");
									
									while((s = bw.readLine()) != null)
									{
										sbcd.append(s.trim());
									}
									
									String ar[] = sbcd.toString().split(":");
									bank_conf = ar[1];
								}
								catch(Exception ee)
								{
									bank_conf = "Unable to connect to port";
									
								}
							}
							
							
							
							StringBuilder sd = new StringBuilder("");
							int priority = 1;
							if(bb[6].equals("priority"))
							priority = 2;
							sd.append("030000:zxcvbn:"+bb[0]+":"+bb[0]+":1:"+priority+":"+bb[7]);
							
							BufferedWriter bbship = new BufferedWriter(new FileWriter("/fake/shipping.dat"));
							bbship.write(sk.toString());
							bbship.close();
							
							new shipClient(null);
							
							
							
							
							
							
							
						
							BufferedReader payer = new BufferedReader(new FileReader("/data/payment_history.txt"));
							s = payer.readLine();
							String print = s;
							StringBuilder totalFile = new StringBuilder("");
							StringBuilder outFile = new StringBuilder("");
							outFile.append(s+"\n");
							
								try{
									BufferedReader ship_rep = new BufferedReader(new FileReader("/fake/shipConf.dat"));
									StringBuilder ssb = new StringBuilder("");
									
									while((s = bw.readLine()) != null)
									{
										ssb.append(s.trim());
									}
									
									String ar[] = sb.toString().split(":");
									ship_conf = ar[1];
								}
								catch(Exception ee)
								{
									ship_conf = "unable to connect to port";
								}
							
							
							while((s = payer.readLine()) != null)
								{
									totalFile.append(s.trim());
								}
							for(String pp:totalFile.toString().split("\\$%\\$"))
								{
									String[] info = pp.split("%\\$%");
									if(bb[0].trim().equals(info[0].trim()))
									{
										info[8] = bank_conf;
										info[12] = ship_conf;
									}
									totalFile.append(info[0]+"%$%"+info[1]+"%$%"+info[2]+"%$%"+info[3]+"%$%"+info[4]+"%$%"+info[5]+"%$%"+info[6]+"%$%"+info[7]+"%$%"+info[8]+"%$%"+info[9]+"%$%"+info[10]+"%$%"+info[11]+"%$%"+info[12]+"$%$\n");
								}
								
							BufferedWriter bbxpp = new BufferedWriter(new FileWriter("/data/payment_history_conf.txt"));
							bbxpp.write(totalFile.toString());
							bbxpp.close();
								
						}
					}
							BufferedWriter bbxc = new BufferedWriter(new FileWriter("/data/payment.txt"));
							bbxc.write(start.trim());
							bbxc.close();
			}
			catch(Exception e)
			{
				e.printStackTrace();
				
			}
			
		}
			public static void main(String[] SaM)
			{
				new payconf();
			}

}