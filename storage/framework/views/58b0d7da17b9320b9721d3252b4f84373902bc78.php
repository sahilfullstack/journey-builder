<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SheMatters Journey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/journey.css" />
</head>
<body>
    <div id="app">

        <section class="main container-fluid">
            <div class="row node-area">
                <section class="col-sm-6 offset-sm-3">
                    <div >
                        <div class="row">
                            <div class="col-sm-12 noscroll">

                                <img style="width: 14rem;" src="/images/shematters-logo-new-1.jpg" alt="SheMatters" id="icon">
                                <br> <br>
                                <h2><?php echo e($tree->name); ?></h2>
                                <!-- <p><?php echo e($tree->description); ?></p> -->
                                <p>This is a confidential health assessment form designed to provide insight into your overall health and spread awareness about the goodness of maintaining a proper lifestyle. It is not intended to diagnosis, treat, cure or prevent any disease. The form results will help in identifying the current strengths of your health and early signs of risk factors if any.</p>
                                <p>This health form is developed by experts from western & traditional alternate medicine systems like Ayurveda, Homeopathy & Naturopathy to ensure a comprehensive understanding of your body & mind.</p>
                                <span style="font-size: .9em; font-style: italic;">This form will take about 3-4 minutes of your time</span>                                
                                <hr>
                                <form  role="form" method="post" action="<?php echo e(route('user.onboard', $tree)); ?>">
                                <?php echo csrf_field(); ?>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="accept">
                                    <label class="form-check-label" for="exampleCheck1">I have read and understood She Matters <a href="/images/Consent_document_new.pdf" target="_blank">Consent document</a>, I agree to participate in the study</label>
                                  </div>
                                    <div class="error" style="color: #e74c3c !important; font-style: italic" >
                                      <?php echo e($errors->first()); ?>

                                    </div>
                                  <button type="submit" class="btn btn-primary btn-lg btn-block">Start</button>
                                </form>  
                                <br>
                                <p style="text-align: -webkit-center;">Already a member ?<a href="<?php echo e(route('tree.journey', $tree->slug)); ?>"> Continue</a></p>            

                                <!-- <a href="<?php echo e(route('user.onboard', $tree)); ?>" class="btn btn-primary btn-lg btn-block">START <i class="fas fa-chevron-right fa-fw"></i></a> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    
    </div>
</body>
</html>