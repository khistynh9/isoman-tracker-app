<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konsultasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Konsultasi</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="container">
      <div class="messaging" style="width:90%;">
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="headind_srch">
              <div class="recent_heading">
                <h4>Recent</h4>
              </div>
            </div>
            <!-- <button type="button" onclick="klik('1920383287324737')">Klik coba</button> -->
            <div class="inbox_chat" id="inbox_chat">
              <!-- lis chat -->
            </div>
          </div>
          <div class="mesgs">
            <div class="msg_history" id="messages">
              <div class="recent_heading_msg">
                <h4>Nama Pasien : <?= $nama = isset($user) ? $user['nama'] : 'Pesan Belum Dipilih'; ?></h4>
              </div><br>
            </div>

            <div class="type_msg">
              <div class="input_msg_write">
                <form onsubmit="return sendMessage();">
                  <input id="receiver" autocomplete="off" type="hidden" class="write_msg" value="" />
                  <input id="messaage" autocomplete="off" type="text" class="write_msg" placeholder="ketikan sebuah pesan" />
                  <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>


    </div>
</div>

<!-- /.content-wrapper -->
</section>

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
  const db = firebase.database();

  var myName = "<?= $this->session->userdata('puskesmas_id'); ?>";
  var base_url = "<?php echo base_url(); ?>";

  var listRef = db.ref('user_chat');
  listRef.on("child_added", snapshot => {

    let id_admin = snapshot.val().id_admin;
    let id_user = snapshot.val().id_user;
    var list = "";
    list += '<div class="chat_list active_chat">' +
      '<div class="chat_people">' +
      '<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>' +
      '<div class="chat_ib" id="' + id_user + '">' +
      '<input type="hidden" name="list" value="' + id_user + '">' +
      '<h5><a href="' + base_url + 'konsultasi/chat/' + id_user + '">' + id_user + ' </a><span class="chat_date">Dec 25</span></h5>' +
      '<p>Test, which is a new approach to have all solutionsastrology under one roof.</p>' +
      '</div>' +
      '</div>' +
      '</div>';
    // console.group(`hasil query`);
    // console.log(id_admin);
    // console.groupEnd();

    document.getElementById("inbox_chat").innerHTML += list;

  });

  <?php if (isset($nik_user)) :
  ?>
    var nik_user = "<?php echo $nik_user;
                    ?>";
    var pasien = "<?php echo $user['nama'];
                  ?>";
    listRef.orderByChild("id_user").equalTo(nik_user).on("value", function(snapshot) {
      if (snapshot.exists()) {
        myFunction(nik_user);
      } else {
        listRef.push({
          id_admin: myName,
          id_user: nik_user,
          pasien: pasien
        });
      }
    });
  <?php endif
  ?>

  function myFunction(nik) {
    $('#receiver').val(nik)

    db.ref("cat").on("child_added", function(snapshot) {
      var kirim = nik;
      var html = "";

      if (snapshot.val().user == myName && snapshot.val()._id == kirim) {
        //memberi pesan id unik
        html += "<div class='incoming_msg' id='message-" + snapshot.key + "'>";
        html += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
        html += "<div class='received_msg'>";
        html += "<div class='received_withd_msg' >";
        html += "<p>" + snapshot.val().user + ": " + snapshot.val().text + "</p>";

        html += " <span class='time_date'>" + snapshot.val().createdAt + "</span></div>";
        html += "</div>";
        html += "</div>";

      } else if (snapshot.val()._id == myName && snapshot.val().user == kirim) {
        html += "<div class='outgoing_msg' id='message-" + snapshot.key + "'>";
        html += "<div class='sent_msg'>";
        html += "<p>" + snapshot.val().text + " </p>";
        html += "<span class='time_date'>" + snapshot.val().createdAt;
        html += "<button data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
        html += "Hapus";
        html += "</button>";
        html += "</div> </span> </div>";
      }

      document.getElementById("messages").innerHTML += html;

    });

  }

  function sendMessage() {
    //dapat pesan
    var message = document.getElementById("messaage").value;
    var reciv = document.getElementById("receiver").value;

    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date + ' ' + time;

    //save in database
    firebase.database().ref("cat").push().set({
      "_id": myName,
      "createdAt": dateTime,
      "text": message,
      "user": reciv
    });

    return false;
  }

  function deleteMessage(self) {
    //get id
    var messageId = self.getAttribute("data-id");

    //delete pesan
    firebase.database().ref("messages").child(messageId).remove();
  }
  // attach listener
  firebase.database().ref("messages").on("child_removed", function(snapshot) {
    // hapus pesan node
    document.getElementById("message-" + snapshot.key).innerHTML = "Pesan Ini telah dihapus";
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $("#konsultasiMainNav").addClass('active');
    $("#liveChat").addClass('active');
  });
</script>