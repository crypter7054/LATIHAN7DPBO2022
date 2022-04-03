<?php 

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}


	// fungsi untuk menambahkan data
	function addData(){
		
		// assign value dari var nama, deadline, detail, subject, dan priority menjadi value dari nama variabel pada index tampilan
		$name = $_POST['tname'];
		$deadline = $_POST['tdeadline'];
		$details = $_POST['tdetails'];
		$subject = $_POST['tsubject'];
		$priority = $_POST['tpriority'];

		// query mysql untuk insert data ke database
		$query = "INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td)
				VALUES ('$name', '$details', '$subject', '$priority', '$deadline', 'Belum')";

		// eksekusi query
		return $this->execute($query);
	}


	// fungsi untuk menghapus data
	function deleteData($id){

		// query mysql untuk menghapus data pada database berdasarkan id
		$query = "DELETE FROM tb_to_do WHERE id = $id";

		// eksekusi query
		return $this->execute($query);
	}


	// fungsi untuk mengubah status
	function changeStatus($id){
		 
		// query mysql untuk mengubah value Status dari database berdasarkan id
		$query = "UPDATE tb_to_do SET status_td = 'Sudah' WHERE id = $id";

		// eksekusi query
		return $this->execute($query);
	}
	

	// fungsi untuk sorting data
	function sortData($type){

		// kondisi untuk sorting by prioritas maka harus 
		if($type == 'priority_td'){

			// convert value dari prioritas menjadi nilai integer agar bisa disorting
			// low = 1, medium = 2, dan high = 3
			$query = "SELECT * FROM tb_to_do 
						ORDER BY CASE 
							WHEN priority_td = 'High' THEN '3'
							WHEN priority_td = 'Medium' THEN '2'
							WHEN priority_td = 'Low' THEN '1'
						END ASC";
		}
		else{

			// query mysql untuk sorting secara ascending
			$query = "SELECT * FROM tb_to_do ORDER BY $type ASC";
		}

		// Mengeksekusi query
		return $this->execute($query);
	}
}

?>