<link rel="stylesheet" type="text/css" href="css.css">
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>

 <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
 <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>

 <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
 <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

 <script>
   // TODO: Replace the following with your app's Firebase project configuration
   // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field
   var firebaseConfig = {
   piKey: "AIzaSyCr3IQ8HnSA15wvMSG2N5B-sJEhQ8JC0hM",
   authDomain: "pertama-5fa3b.firebaseapp.com",
   projectId: "pertama-5fa3b",
   storageBucket: "pertama-5fa3b.appspot.com",
   messagingSenderId: "532635605413",
   appId: "1:532635605413:web:c1587dacda146a61ed704c"
   };

   // Initialize Firebase
   firebase.initializeApp(firebaseConfig);
  

   var myName = "<?php echo $_SESSION['data']['nama']; ?>";

   function sendMessage(){
   //dapat pesan

   var message = document.getElementById("messaage").value;
   var reciv = document.getElementById("receiver").value;

  

   //save in database
   firebase.database().ref("messages").push().set({
       "sender": myName,
       "reciver" : reciv,
       "message": message
   });

   return false;
   }
   
   
   // listen for incoming message
   firebase.database().ref("messages").on("child_added", function (snapshot){
   var kirim = document.getElementById("receiver").value;
   var html = "";
   if (snapshot.val().reciver == myName && snapshot.val().sender == kirim) {
   //memberi pesan id unik
   html += "<div class='incoming_msg' id='message-" + snapshot.key +"'>";
   html +=  "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
   html +=   "<div class='received_msg'>";
   html +=   "<div class='received_withd_msg' >";
   html +=  "<p>" + snapshot.val().sender +":"+snapshot.val().message + "</p>";

  html += " <span class='time_date'> 11:01 AM    |    June 9</span></div>";
  html +=    "</div>";
  html +="</div>";

  } else if (snapshot.val().sender == myName && snapshot.val().reciver == kirim){
    html += "<div class='outgoing_msg' id='message-" + snapshot.key +"'>";
    html += "<div class='sent_msg'>";
    html += "<p>" + snapshot.val().sender +":"+snapshot.val().message + ":"+snapshot.val().reciver + " </p>";
    html += "<span class='time_date'> 11:01 AM    |    Today &nbsp;";
    html += "<button data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
      html += "Hapus";
      html += "</button>";
    html += "</div> </span> </div>";
  }
    document.getElementById("messages").innerHTML += html;
  });
  

   function deleteMessage(self) {
     //get id
     var messageId = self.getAttribute("data-id");

     //delete pesan
     firebase.database().ref("messages").child(messageId).remove();
         }
   // attach listener
   firebase.database().ref("messages").on("child_removed", function (snapshot){
   // hapus pesan node
   document.getElementById("message-" + snapshot.key).innerHTML = "Pesan Ini telah dihapus";
   });
//    let chatList = document.getElementById("messages");
// chatList.scrollTop = chatList.scrollHeight
// con.scrollTop = con.scrollHeight;
 </script>
<div class="container">

	<h4>Selamat datang, <?php echo $_SESSION['data']['nama']; ?>! anda telah login.</h4>
    <a href="logout.php">LOGOUT</a>
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
          <?php
            include "../koneksi.php";
            $no=0;
              $query	=mysqli_query($koneksi, "SELECT * FROM tb_karyawan ORDER BY id_karyawan DESC");
              while($result	=mysqli_fetch_array($query)){
              $no++	
          ?>
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib" id="pengirim">
                  <h5><a href="index.php?id_karyawan=<?=$result['id_karyawan']?>">
                  <?php echo $result['nama']?> </a> <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <?php }?>
            
          </div>
        </div>
        <div class="mesgs " >
          <div class="msg_history" id="messages">
          <?php
	if(isset($_GET['id_karyawan'])){
		$id_karyawan	=$_GET['id_karyawan'];
	}
	else {
		die ("Silahkan Pilih Teman Anda");	
	}
	include "../koneksi.php";
	$query	=mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'");
	$result	=mysqli_fetch_array($query);
?>
	<table border="0" cellpadding="4">
		<tr>
			<td size="90">Nama :</td>
			<td ><?php echo $result['nama']?></td>
		</tr>
	</table>
            
          </div>
          <form onsubmit="return sendMessage();">
          <div class="type_msg">
            <div class="input_msg_write">
              <input id="receiver"  autocomplete="off" type="text" class="write_msg" value="<?php echo $result['nama']?>" />
              <input id="messaage"  autocomplete="off" type="text" class="write_msg" placeholder="ketikan sebuah pesan" />
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
          </div>
        </form>
        </div>
      </div>
      
      
    </div></div>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#chatTable').DataTable({
            'order': [],
        });

        $("#konsultasiMainNav").addClass('active');
        $("#liveChat").addClass('active');
    });
</script>