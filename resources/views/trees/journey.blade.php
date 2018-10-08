<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SheMatters Journey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/journey.css" />
</head>
<body>
    <div id="app">

        <section class="main container-fluid">
            <div class="row node-area">
                <section class="col-sm-6 offset-sm-3">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <img style="margin-left:0;margin-bottom:0;"  src="/images/shematters-logo-color.png" alt="SheMatters" id="icon">
                                <span>Be healthy, naturally</span>
                                <br>
                                <h2>{{ $tree->name }}</h2>
                                <!-- <p>{{ $tree->description }}</p> -->
                                <p>This is a confidential health assessment form designed to provide insight into your overall health and spread awareness about the goodness of maintaining a proper lifestyle. It is not intended to diagnosis, treat, cure or prevent any disease. The form results will help in identifying the current strengths of your health and early signs of risk factors if any.</p>
                                <p>This health form is developed by experts from western & traditional alternate medicine systems like Ayurveda, Homeopathy & Naturopathy to ensure a comprehensive understanding of your body & mind.</p>
                                <span style="font-size: .9em; font-style: italic;">This form will take about 3-4 minutes of your time</span>                                
                                <hr>
                                <form  role="form" method="post" action="{{ route('user.existing', $tree) }}">
                                {!! csrf_field() !!}
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>                                 
                                    <div class="error" style="color: #e74c3c !important; text-align:center" >
                                      {{{ $errors->first() }}}
                                    </div>
                                  <button type="submit" class="btn btn-primary btn-lg btn-block">Start</button>
                                </form>                                
                                <!-- <a href="{{ route('user.onboard', $tree) }}" class="btn btn-primary btn-lg btn-block">START <i class="fas fa-chevron-right fa-fw"></i></a> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    
    </div>
</body>
</html>