<?php
$web_title = "Create Promotion";
include("header.php");
?>
<!-- START FROM HOME -->

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
                                <h4 class="card-title">Promote your Business</h4>
                                <h6 class="card-subtitle">create a promoted AD</h6>
                                <form action="../function/create_promotion.php" method="POST" class="validation-wizard wizard-circle mt-5" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Step 1 - Destination</h6>
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
                                            <span class="input-group-text">Ad Image (Fake Path for Encryption)</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Ad Category : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="wlocation2" name="location">
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
                                    <h6>Step 2 - Ad Content</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle2">Ad Heading :</label>
                                                    <input type="text" class="form-control required" id="jobTitle2">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="webUrl3">Ad Sub-Heading :</label>
                                                    <input type="text" class="form-control required" id="jobTitle2"> </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Short Description :</label>
                                                    <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Step 3 - Audience</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wint1">Audience Name :</label>
                                                    <input type="text" class="form-control required" id="wint1"> </div>
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
                                                    <label for="wLocation1">Campus Location :</label>
                                                    <select class="custom-select form-control required" id="wLocation1" name="wlocation">
                                                        <option value="0">All</option>
                                                        <option value="1">Uni Abuja</option>
                                                        <option value="2">Uni Benin</option>
                                                        <option value="3">Uni Lagos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <div class="form-group">
                                                    <label for="wjobTitle2">Interview Date :</label>
                                                    <input type="date" class="form-control required" id="wjobTitle2">
                                                </div> -->
                                                <div class="form-group">
                                                    <label>Auto Renew:</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio16" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio16">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio17" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio17">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Step 4 - Budget & Duration</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Budget - NGN <span id="demo" >1500</span> (Amount Due - NGN <span id="amt_due">1500</span>) </h4>
                                <div class="form-group">
                                <div class="rangeslider"> 
                                    <input type="range" min="1500" max="500000" value="1500"
                                    class="myslider" id="sliderRange">
                                </div> 
                                </div>
                                <h4 class="card-title">Duration - <span id="demoa">0</span> Day(s)</h4>
                                <div class="form-group">
                                <div class="rangeslider">
                                    <input type="range" min="1" max="360" value="1"
                                    class="myslider" id="sliderRangea">
                                </div> 
                                </div>
                                <div class="form-group">
                                <input type="text" value="1818" name="total_reach" id="tot_rch" hidden>
                                <input type="text" value="727" name="total_click" id="clk" hidden>
                                <input type="text" value="364" name="total_conver" id="cnv" hidden>
                                <input type="number" value="1500" name="amount" id="cash_paid">
                                </div>
                            </div>
                            <script> 
                            var rangeslider = document.getElementById("sliderRange");
                            var output = document.getElementById("demo");
                            var qamt = document.getElementById("amt_due");
                            var calc_reach = document.getElementById("est_reach");
                            var calc_click = document.getElementById("clicks");
                            var calc_conv = document.getElementById("conversion");
                            // aiit
                            // AIIT
                            output.innerHTML = rangeslider.value; 
                            rangeslider.oninput = function() { 
                            output.innerHTML = this.value; 
                            // GET Min Aud
                            var x = 50;
                            // Total No of Rep
                            var y = 2000;
                            // Total Conversion
                            var z = 10000;
                            // Min ad Amt
                            var a = 1500;
                            // D Dura  
                            var d = document.getElementById("sliderRangea").value;
                            // Budget amt.
                            var ba = document.getElementById("sliderRange").value;
                            // DO THE MATHS
                            var fst = ((ba / a) * x) * d;
                            var snd = fst - (y + z);
                            if ( snd < fst) {
                                Reach = snd * 0.7;
                            } 
                            else if (snd >= fst) {
                                Reach = snd + (y + z);
                            }
                            Max_r  = Reach + (y + z);
                            if (d < 7 && ba < 500000) {
                                Max_r = Max_r * 0.5;
                            }
                            // showing
                            var amount_due = d * ba;
                            // end
                            calc_reach.innerHTML = Math.round(Max_r);
                            calc_click.innerHTML = Math.round(Max_r * 0.4);
                            calc_conv.innerHTML = Math.round(Max_r * 0.2);
                            qamt.innerHTML = amount_due;
                            // geting amount
                            $('#tot_rch').val(Math.round(Max_r));
                            $('#clk').val(Math.round(Max_r * 0.4));
                            $('#cnv').val(Math.round(Max_r * 0.2));
                            $('#cash_paid').val(amount_due);
                            }
                            </script>
                             <script> 
                            var rangeslidera = document.getElementById("sliderRangea"); 
                            var outputa = document.getElementById("demoa"); 
                            var qamt = document.getElementById("amt_due");
                            var calc_reach = document.getElementById("est_reach");
                            var calc_click = document.getElementById("clicks");
                            var calc_conv = document.getElementById("conversion");
                            outputa.innerHTML = rangeslidera.value; 
                            rangeslidera.oninput = function() { 
                            outputa.innerHTML = this.value; 
                            // GET Min Aud
                            var x = 50;
                            // Total No of Rep
                            var y = 2000;
                            // Total Conversion
                            var z = 10000;
                            // Min ad Amt
                            var a = 1500;
                            // D Dura  
                            var d = document.getElementById("sliderRangea").value;
                            // Budget amt.
                            var ba = document.getElementById("sliderRange").value;
                            // DO THE MATHS
                            // we good
                            var fst = ((ba / a) * x) * d;
                            var snd = fst - (y + z);
                            if ( snd < fst) {
                                Reach = snd * 0.7;
                            } 
                            else if (snd >= fst) {
                                Reach = snd + (y + z);
                            }
                            Max_r  = Reach + (y + z);
                            if (d < 7 && ba < 500000) {
                                Max_r = Max_r * 0.5;
                            }
                            // amount
                            var amount_due = d * ba;
                            // done with
                            calc_reach.innerHTML = Math.round(Max_r);
                            calc_click.innerHTML = Math.round(Max_r * 0.4);
                            calc_conv.innerHTML = Math.round(Max_r * 0.2);
                            qamt.innerHTML = amount_due;
                            // showing
                            $('#tot_rch').val(Math.round(Max_r));
                            $('#clk').val(Math.round(Max_r * 0.4));
                            $('#cnv').val(Math.round(Max_r * 0.2));
                            $('#cash_paid').val(amount_due);
                            // $('#amt_due').val(amount_due);
                            // DATE
                            } 
                            </script>
                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="card">
                                                <!-- incalculating, you need MIN REACH, NO of Rep -->
                                <div class="card-body text-center">
                                    <h4 class="text-center text-info">Est. Reach</h4>
                                    <h2> <span id="est_reach">1818</span> </h2>
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col text-center align-self-center">
                                            <div data-label="100%" class="css-bar mb-0 css-bar-primary css-bar-100"><i class="display-6 mdi mdi-account-circle"></i></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="font-medium mb-0"><i class="ti-angle-up text-success"></i> <br> clicks <span id="clicks">727</span> </h4>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="font-medium mb-0"><i class="ti-angle-down text-danger"></i> <br> conversion <span id="conversion">364</span> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            </div>
                                        </div>
                                    </section>
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
            swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

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
            swal("Form Submitted!", "Ad Content has been submitted sucessfully!.");
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