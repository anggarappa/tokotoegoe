<h2>Selamat Datang Admin</h2>

<?php 
$ip      = $_SERVER['REMOTE_ADDR']; 
 		$tanggal = date("Ymd"); 
 		$waktu   = time(); 

 		$where =  array('ip' => $ip,
						'tanggal' => $tanggal);
 
 		$s = $this->db->FROM('statistik')->WHERE($where)->get();
 
 		if($s->num_rows() == 0){
 			$data = [
							'ip' => $ip,
							'tanggal' => $tanggal,
							'hits' => 1,
							'online' => $waktu
						];
     		$this->db->insert('statistik', $data);
 		}else{
 			$data = [
							'ip' => $ip,
							'tanggal' => $tanggal,
							'hits' => +1,
							'online' => $waktu
						];
			$this->db->UPDATE('statistik', $data, $where);
 		}
 
 		$pengunjung = $this->db->FROM('statistik')->WHERE('statistik.tanggal', $tanggal)->GROUP_BY('statistik.ip')->get()->num_rows(); 
 		$bataswaktu = time() - 300;
 		$pengunjungonline = $this->db->FROM('statistik')->WHERE('online >',$bataswaktu)->get()->num_rows();

 ?> 
 
 <h4>Pengunjung Hari ini : <strong> <?php echo $pengunjung; ?> </strong></h4><br>
 <h4> Pengunjung Online : <strong> <?php echo $pengunjungonline; ?> </strong></h4>
