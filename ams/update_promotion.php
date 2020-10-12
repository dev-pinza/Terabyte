<?php
$web_title = "Edit Promotion";
include("header.php");
require_once "../bat/phpmailer/PHPMailerAutoload.php";
?>
<!-- START FROM HOME -->
<?php
                    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //     // END
                    //     $client_id = $user_id;
                    //     // we are ready to start
                    //     $dest = $_POST["location"];
                    //     $fire = $_POST["webUrl3"];
                    //     $cat = $_POST["ad_cat"];
                    //     $head = addslashes($_POST["head"]);
                    //     $title = addslashes( $_POST["title"]);
                    //     $body = addslashes($_POST["shortDescription"]);
                    //     $aud_name = addslashes($_POST["aud_name"]);
                    //     $age_gend = $_POST["wintType1"];
                    //     $int_loc = $_POST["int_loc"];
                    //     $auto_renew = $_POST["customRadio"];
                    //     // PICTURES
                    //     // END PICTURES
                    //     $temp1 = explode(".", $_FILES['chooseFile']['name']);
                    //     $digits = 10;
                    //     $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                    //     $sig_passport_one = $randms1. '.' .end($temp1);
                    //     if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "ad_img/" . $sig_passport_one)) {
                    //     $msg = "Image uploaded successfully";
                    //     } else {
                    //       $msg = "Image Failed";
                    //     }
                    //    $mex = substr($sig_passport_one, -3);
                    //    if ($mex != "png" && $mex != "jpg" && $mex != "peg") {
                    //       $sig_passport_one = "av.jpg";
                    //     }
                    //     // POST LINK GEN
                    //     // mke the move
                    //     // end ove
                    // }
                    ?>
<!-- <script src="..assets/libs/jquery/dist/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
<?php 
if (isset($_GET["ad_id"]) && $_GET["ad_id"] != "") {
?>
<!-- ALI -->
<style> 
  
.rangeslider{ 
    width: 100%; 
} 
  
.myslider { 
    -webkit-appearance: none; 
    background: #FCF3CF  ; 
    width: 100%; 
    height: 20px; 
    opacity: 2; 
   } 
  
  
.myslider::-webkit-slider-thumb { 
    -webkit-appearance: none; 
    cursor: pointer; 
    background: #34495E  ; 
    width: 5%; 
    height: 20px; 
} 
  
  
.myslider:hover { 
    opacity: 1; 
} 
  
</style> 
 <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                       <!-- ============================================================== -->
                    <!-- Example -->
                  
                    <!-- ============================================================== -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <h4 class="card-title">Edit Business Promotion</h4>
                                <h6 class="card-subtitle">Update a promoted AD</h6>
                                <form method="POST" id="dman_sub" class="validation-wizard wizard-circle mt-5" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Step 1 - Destination (Update)</h6>
                                    <section>
                                        <div class="row"> 
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Select Destination : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="wlocation2" name="location">
                                                        <option value="1">Social Media (Whatsapp, Instagram, Facebook, +3 others)</option>
                                                        <option value="2">Website & Blog</option>
                                                        <option value="3">Instance Message</option>
                                                        <option value="4">Payment Page</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Fire-Link Address : <span class="danger">*</span> </label>
                                                    <input type="url" class="form-control required" value="https://" id="webUrl3" name="webUrl3"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ad Image Path(Encrypted)</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input required" name="chooseFile" accept="image/*" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Ad Category(Update) : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="wlocation2" name="ad_cat">
                                                        <option value="1">Finance & Investment</option>
                                                        <option value="2">Transportation</option>
                                                        <option value="3">Software/Computer & Eletronic Gadget</option>
                                                        <option value="4">E-commerce</option>
                                                        <option value="5">Education</option>
                                                        <option value="6">Health/Skin Care & Pharmacecutical</option>
                                                        <option value="7">Food & Agriculture</option>
                                                        <option value="8">Entertainment & Music</option>
                                                        <option value="9">News & Media</option>
                                                        <option value="10">Manufacturing</option>
                                                        <option value="11">Energy and Power</option>
                                                        <option value="12">Mining</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Step 2 - Ad Content(Update)</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle2">Ad Heading (<span id="h_c">0</span> / 50 characters) :</label>
                                                    <input type="text" name="head" class="form-control required" id="head">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="webUrl3">Ad Sub-Heading (<span id="s_h">0</span> / 50 characters) :</label>
                                                    <input type="text" name="title" class="form-control required" id="sub"> </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Short Description (<span id="s_d">0</span> / 500 characters) :</label>
                                                    <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <script>
                                            $(document).ready(function () {
                                                $('#head').on("change keyup paste click", function(e){
                                                    var head = $('#head').val()
                                                    var h_c = document.getElementById("h_c");
                                                    var head_count = head.length;
                                                    // end the count
                                                    h_c.innerHTML = head_count;
                                                    if (head_count > 49 && e.keyCode !== 46  && e.keyCode !== 8) {
                                                        document.getElementById('head').readOnly = true;
                                                        //  console.log(head_count);
                                                        var calc_head = head_count - 49;
                                                        if (calc_head > 1) {
                                                            var new_head = head.slice(0, -calc_head);
                                                            $('#head').val(new_head);
                                                        } 
                                                    } else {
                                                        document.getElementById('head').readOnly = false;
                                                    }
                                                });
                                                // check sub body
                                                $('#sub').on("change keyup paste click", function(x){
                                                    var sub = $('#sub').val()
                                                    var sub_count = sub.length;
                                                    var s_h = document.getElementById("s_h");
                                                    // end the count
                                                    s_h.innerHTML = sub_count;
                                                    if (sub_count > 49 && x.keyCode !== 46  && x.keyCode !== 8) {
                                                        document.getElementById('sub').readOnly = true;
                                                        //  console.log(head_count);
                                                        var calc_sub = sub_count - 49;
                                                        if (calc_sub > 1) {
                                                            var new_sub = sub.slice(0, -calc_sub);
                                                            $('#sub').val(new_sub);
                                                        } 
                                                    } else {
                                                        document.getElementById('sub').readOnly = false;
                                                    }
                                                    // end the count
                                                });
                                                // end
                                                $('#shortDescription3').on("change keyup paste click", function(c){
                                                    var desc = $('#shortDescription3').val()
                                                    var desc_count = desc.length;
                                                    // end the count
                                                    var s_d = document.getElementById("s_d");
                                                    // end the count
                                                    s_d.innerHTML = desc_count;
                                                    if (desc_count > 499 && c.keyCode !== 46  && c.keyCode !== 8) {
                                                        document.getElementById('shortDescription3').readOnly = true;
                                                        //  console.log(head_count);
                                                        var calc_desc = desc_count - 499;
                                                        if (calc_desc > 1) {
                                                            var new_desc = desc.slice(0, -calc_desc);
                                                            $('#shortDescription3').val(new_desc);
                                                        } 
                                                    } else {
                                                        document.getElementById('shortDescription3').readOnly = false;
                                                    }
                                                });
                                             });
                                            </script>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Step 3 - Audience(Update)</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wint1">Audience Name :</label>
                                                    <input type="text" class="form-control required" name="aud_name" id="wint1"> </div>
                                                <div class="form-group">
                                                    <label for="wintType1">Age & Gender :</label>
                                                    <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                                        <option value="0">All</option>
                                                        <option value="1">All | 18 +</option>
                                                        <option value="2">MALE | 18 +</option>
                                                        <option value="3">FEMALE | 18 +</option>
                                                        <option value="4">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                    $digits = 9;
                                                    $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                                                    $cache_id = $randms;
                                                    $_SESSION["cache_id"] = $cache_id;
                                                    // random ID
                                                    ?>
                                                    <div id="hide_later">
                                                    <?php
function fill_in($connection)
{
    $get_cache = mysqli_query($connection, "SELECT * FROM `institution` WHERE active = '1'");
    $output = '';
    while($rowx = mysqli_fetch_array($get_cache)) {
        $output .= '<option value = "'.$rowx["id"].'"> '.strtoupper($rowx["name"]).' </option>';
    }
return $output;
}
?>
<label for="wLocation1">Campus Location :</label>
<select class="custom-select form-control required" id="au_change" name="int_loc">
    <option value="all">All</option>
<?php 
echo fill_in($connection);
?>
</select>
<a id="add_up" class="btn btn-success">Update</a>
                                                    </div>
                                                   <!-- <div id="show_int"></div> -->
                                                </div>
                                            </div>
                                            <input type="text" value="<?php echo $cache_id; ?>" id ="cache_id" hidden>
<script>
$(document).ready(function () {
             $('#add_up').on("click", function (e) {
               var c_id = $('#cache_id').val();
               var int_id = $('#au_change').val();
                if (int_id != "all") {
                    $.ajax({
                 url: "ajax_post/aud_show.php",
                 method: "POST",
                 data:{c_id:c_id, int_id:int_id},
                 success: function (data) {
                   $('#aud_rec').html(data);
                 }
               });
               e.stopImmediatePropagation();
    e.preventDefault();
                }
             });
             setInterval(function() {
                var c_id = $('#cache_id').val();
                    $.ajax({
                 url: "ajax_post/show_aud.php",
                 method: "POST",
                 data:{c_id:c_id},
                 success: function (data) {
                   $('#display_aud').html(data);
                 }
               });
            }, 1000); 
           });                
</script>
                                            <div class="col-md-6">
                                            <div id="aud_rec"></div>
                                                <div class="form-group">
                                                <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle">Audience</h6>
                                <!-- <table data-toggle="table" data-height="200" data-mobile-responsive="true"
                                    class="table-striped">
                                    <thead>
                                            <th>Audience Name/ Campus Name</th>]
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>DMAN</td>
                                        </tr> -->
                                        <div id="display_aud"></div>
                                        <div id="done_delete"></div>

                                    <!-- </tbody>
                                </table> -->
                            </div>
                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Auto Renew:</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio16" value="1" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio16">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio17" value="0" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio17">No</label>
                                                        </div>
                                                    </div>
                                            <input type="text" name="fake_cache" value="<?php echo $cache_id; ?>" id="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Example -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <?php
} else {
     // GO BACK
     echo '<script type="text/javascript">
     $(document).ready(function(){
      swal.fire({
       type: "error",
       title: "No Promotion Found",
       text: "Please Select an Ad",
      showConfirmButton: false,
       timer: 2000
       }).then(
       function (result) {
         history.go(-1);
       }
       )
       });
      </script>
     ';
}
            ?>
<?php
include("footer.php");
?>
<script>
    //Basic Example
    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true
    });

    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });

    // Advance Example

    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });

    // Dynamic Manipulation
    $("#example-manipulation").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        enablePagination: false
    });

    //Vertical Steps

    $("#example-vertical").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical"
    });

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex) {
            swal.fire("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

        }
    });


    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            let timerInterval
Swal.fire({
  title: 'Processing!',
  html: 'Please Wait! <b></b> .',
  timer: 2000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
  document.getElementById("dman_sub").submit();
})
// HERE I WILL HAVE MY AJAX
// HERE I WILL END MY AJAX
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })
    </script>