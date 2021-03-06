<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
    $_SESSION['mentormax']=false;
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 

    if($_SESSION['user']['mentor']==0) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: private.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to private.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 


?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <title>Mentor Bear | Profile</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

        <meta name="description" content="FlexyCodes - FlexyCard vCard Template. Creating my personal page!"/>

        <!-- CSS | bootstrap -->
        <!-- Credits: http://getbootstrap.com/ -->
        <link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

        <!-- CSS | font-awesome -->
        <!-- Credits: http://fortawesome.github.io/Font-Awesome/icons/ -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

        <!-- CSS | animate -->
        <!-- Credits: http://daneden.github.io/animate.css/ -->
        <link rel="stylesheet" type="text/css" href="css/animate.min.css" />

        <!-- CSS | Normalize -->
        <!-- Credits: http://manos.malihu.gr/jquery-custom-content-scroller -->
        <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />

        <!-- CSS | Colors -->
        <link rel="stylesheet" type="text/css" href="css/colors/DarkBlue.css" />

        <!-- CSS | Style -->
        <!-- Credits: http://themeforest.net/user/FlexyCodes -->
        <link rel="stylesheet" type="text/css" href="css/main.css" />

        <!-- CSS | prettyPhoto -->
        <!-- Credits: http://www.no-margin-for-errors.com/ -->
        <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css"/> 

        <!-- CSS | Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <!-- Favicon 
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon/favicon.ico">-->

        <!--[if IE 7]>
                <link rel="stylesheet" type="text/css" href="css/icons/font-awesome-ie7.min.css"/>
        <![endif]-->

        <style>
            @media only screen and (max-width : 991px){
                .resp-vtabs .resp-tabs-container {
                    margin-left: 13px;
                }
            }
            @media only screen and (min-width : 800px) and (max-width : 991px){
                .resp-vtabs .resp-tabs-container {
                    margin-left: 13px;
                    width:89%;
                }
            }           

        </style>
        
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <link rel="stylesheet" type="text/css" href="css/chat.css" />



    </head>

    <body>

        <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Laoding page -->
        <div id="preloader"><div id="spinner"></div></div>

        <!-- .slideshow -->
        <!--<ul class="cb-slideshow" id="cb_slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div></div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>
            <li><span>Image 05</span><div></div></li>
            <li><span>Image 06</span><div></div></li>
        </ul> -->
        <!-- /.slideshow -->  

        <!-- .wrapper --> 
        <div class="wrapper">

            <!--- .Content --> 
            <section class="tab-content">
                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">   


                                <div class="col-md-3 widget-profil">
                                    <div class="row">

                                        <!-- Profile Image -->
                                        <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12 ">

                                            
                                            
                                            <div class="image-holder one" id="pic_prof_1"  >
                                                
                                                <img class="head-image up circle center-cropped3" style="background-image" src=<?php echo $_SESSION['userprof']['photo']; ?>  alt="" />
                                               

                                            </div>

                                            <!-- style for simple image profile -->     
                                           
                                        </div>
                                        <!-- End Profile Image -->

                                        <div class="col-lg-12 col-md-12 col-sm-9 col-xs-12">

                                            <!-- Profile info -->
                                            <div id="profile_info">
                                                <h1 id="name" class="transition-02"><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
                                                <h4 class="line"><span class="value"><?php if($_SESSION['userprof']['hschool']==1) {
                                                                        echo "High School";
                                                                    } else {
                                                                        echo "College";
                                                                    }

                                                                     ?> Student</span>
                                                                <div class="clear"></div></h4>
                                                <h6><span class="fa fa-map-marker"></span> <?php echo htmlentities($_SESSION['userprof']['state'], ENT_QUOTES, 'UTF-8'); ?></h6>
                                            </div>
                                            <!-- End Profile info -->  


                                            <!-- Profile Description -->
                                            <div id="profile_desc">
                                                <p>
                                                
                                                </p>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                            <!-- End Profile Description -->  


                                            <!-- Name -->
                                            <div id="profile_social">
                                                <div id='messagesDiv'></div>
<input type='text' id='nameInput' placeholder='Name'>
<input type='text' id='messageInput' placeholder='Message...'>
<script type='text/javascript'>

  // Get a reference to the root of the chat data.
  var messagesRef = new Firebase('crackling-fire-7217.firebaseio.com');


  // When the user presses enter on the message input, write the message to firebase.
  $('#messageInput').keypress(function (e) {
    if (e.keyCode == 13) {
      var name = $('#nameInput').val();
      var text = $('#messageInput').val();
      messagesRef.push({name:name, text:text});
      $('#messageInput').val('');
    }
  });

  // Add a callback that is triggered for each chat message.
  messagesRef.on('child_added', function (snapshot) {
    var message = snapshot.val();
    $('<div/>').text(message.text).prepend($('<em/>').text(message.name+': ')).appendTo($('#messagesDiv'));
    $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
  });
</script>
                                                <div class="clear"></div>
                                            </div> 
                                            <!-- End Name -->  

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-9 flexy_content" style="padding-left: 0;padding-right: 0;">

                                    <!-- verticalTab menu -->
                                    <div id="verticalTab">

                                        <ul class="resp-tabs-list">
                                            <li class="tabs-blog hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="blog">
                                                <span class="tite-list">blog</span>
                                                <i class="fa fa-bullhorn icon_menu"></i>
                                            </li>


                                            <li class="tabs-profile hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a profile" data-tab-name="profile">           
                                                <span class="tite-list">profile</span>
                                                <i class="fa fa-user icon_menu icon_menu_active"></i>
                                            </li>

                                            <li class="tabs-resume hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="resume"> 
                                                <span class="tite-list">resume</span>
                                                <i class="fa fa-users icon_menu"></i>
                                            </li>

                                            


                                        </ul>
                                        <!-- /resp-tabs-list -->

                                        <!-- resp-tabs-container --> 
                                        <div class="resp-tabs-container">

                                            <!-- .blog -->
                                            <div id="blog" class="content_2">
                                                <h1 class="h-bloc" id="welcome">Welcome to MentorBear!</h1><br> 

                                                <div class="col-md-12">
                                                    <div class="row">

                                                        <!-- Page Blog -->
                                                        <div class="col-md-12" id="blog_page">
                                                            <!-- start Page Blog -->
                                                            <section id="blog-page">

                                                                <!-- Post 1 --> 
                                                                <article id="post-1" class="blog-article">                    

                                                                    <div class="col-md-12">

                                                                        <div class="row">

                                                                            <div class="col-md-12 post_media">
                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-picture-o"></span></a>
                                                                                </div>
                                                                                <div class="media">
                                                                                    <div class="he-wrap tpl2">
                                                                                        <div id="carousel-1" class="carousel slide" data-ride="carousel">

                                                                                            

                                                                                            <div class="carousel-inner">

                                                                                                <div class="item active">
                                                                                                    <img src="img/bearbanner.png" alt="" />
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4></h4>
                                                                                                        <p></p>
                                                                                                    </div>
                                                                                                </div>


                                                                                                <div class="item">
                                                                                                    <img src="http://placehold.it/825x340" alt="" />
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4>First Thumbnail label</h4>
                                                                                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="item">
                                                                                                    <img src="http://placehold.it/825x340" alt="" />
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4>First Thumbnail label</h4>
                                                                                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                            <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                                                                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                                                                            </a>

                                                                                            <a class="right carousel-control" href="#carousel-1" data-slide="next">
                                                                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                                                                            </a>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12 post_content">
                                                                                <div class="content post_format_standart">
                                                                                    <div class="top_c ">

                                                                                        <div class="title_content">
                                                                                            <div class="text_content"><a href="#post-1" class="read_more">MentorBear Updates</a></div>
                                                                                            <div class="clear"></div>
                                                                                        </div>

                                                                                        <ul class="info">
                                                                                            <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                            <li><i class="glyphicon glyphicon-time"></i> July 21, 2014</li>
                                                                                            <li><i class="glyphicon glyphicon-user"></i> by Adrian Black</li>
                                                                                            
                                                                                        </ul>

                                                                                        <div class="blog-content">
                                                                                            <p><i class="fa fa-quote-left"></i> The MentorBear Team is delighted to launch our awesome online platform. </p></div>
                                                                                    </div>
                                                                                </div>  

                                                                                <a href="#post-1" class="read_m pull-right">Read More <i class='glyphicon glyphicon-chevron-right'></i></a>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </article>
                                                                <!-- End Post 1 -->

                                                                <div class="clear"></div>

                                                                <!-- Post 2 -->
                                                                <article id="post-2" class="blog-article">                    

                                                                    <div class="col-md-12">

                                                                        <div class="row">

                                                                            <div class="col-md-12 post_media">

                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-pencil"></span></a>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12 post_content">
                                                                                <div class="content post_format_standart">
                                                                                    <div class="top_c ">

                                                                                        <div class="title_content">
                                                                                            <div class="text_content"><a href="#post-2" class="read_more">Blog Aside post</a></div>
                                                                                            <div class="clear"></div>
                                                                                        </div>

                                                                                        <ul class="info">
                                                                                            <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                            <li><i class="glyphicon glyphicon-time"></i> January 31, 2014</li>
                                                                                            <li><i class="glyphicon glyphicon-user"></i> by Jane Doe</li>
                                                                                            <li><i class="glyphicon glyphicon-tag"></i> php, web design</li>
                                                                                        </ul>

                                                                                        <div class="blog-content">
                                                                                            <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo...</p></div>
                                                                                    </div>
                                                                                </div>  

                                                                                <a href="#post-2" class="read_m pull-right">Read More <i class='glyphicon glyphicon-chevron-right'></i></a>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </article>
                                                                <!-- End Post 2 -->

                                                                <div class="clear"></div>

                                                                <!-- Post 3 -->
                                                                <article id="post-3" class="blog-article">                    

                                                                    <div class="col-md-12">

                                                                        <div class="row">

                                                                            <div class="col-md-12 post_media">

                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-picture-o"></span></a>
                                                                                </div>

                                                                                <div class="media">
                                                                                    <div class="he-wrap tpl2">
                                                                                        <img src="http://placehold.it/825x340" class="img-hover" alt="" />
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12 post_content">
                                                                                <div class="content post_format_standart">
                                                                                    <div class="top_c ">

                                                                                        <div class="title_content">
                                                                                            <div class="text_content"><a href="#post-3" class="read_more">Blog Post Image</a></div>
                                                                                            <div class="clear"></div>
                                                                                        </div>

                                                                                        <ul class="info">
                                                                                            <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                            <li><i class="glyphicon glyphicon-time"></i> January 31, 2014</li>
                                                                                            <li><i class="glyphicon glyphicon-user"></i> by Jane Doe</li>
                                                                                            <li><i class="glyphicon glyphicon-tag"></i> php, web design</li>
                                                                                        </ul>

                                                                                        <div class="blog-content">
                                                                                            <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo...</p></div>
                                                                                    </div>
                                                                                </div>  

                                                                                <a href="#post-3" class="read_m pull-right">Read More <i class='glyphicon glyphicon-chevron-right'></i></a>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </article>

                                                                <!-- End Post 3 -->

                                                            </section>

                                                            <!-- End Page Blog -->



                                                            <!-- Page Blog - Post 1 -->
                                                            <section id="post-1-page" class="content-post" style="display: none">
                                                                <div class="row inner">

                                                                    <div class="col-md-12" style="width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;float: left;background: rgba(255, 255, 255, 0.8);padding-bottom: 15px;padding-top: 15px;">

                                                                        <article class="postPage">

                                                                            <div class="col-md-12 post_media">
                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-picture-o"></span></a>
                                                                                </div>
                                                                                <div class="media">
                                                                                    <div class="he-wrap tpl2">
                                                                                        <div id="carousel-2" class="carousel slide" data-ride="carousel">

                                                                                            <ol class="carousel-indicators">
                                                                                                <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                                                                                                <li data-target="#carousel-2" data-slide-to="1"></li>
                                                                                                <li data-target="#carousel-2" data-slide-to="2"></li>
                                                                                            </ol>

                                                                                            <div class="carousel-inner">

                                                                                                <div class="item active">
                                                                                                    <img src="http://placehold.it/825x340" alt="">
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4>First Thumbnail label</h4>
                                                                                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                                                                    </div>
                                                                                                </div>


                                                                                                <div class="item">
                                                                                                    <img src="http://placehold.it/825x340" alt="">
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4>First Thumbnail label</h4>
                                                                                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="item">
                                                                                                    <img src="http://placehold.it/825x340" alt="">
                                                                                                    <div class="carousel-caption">
                                                                                                        <h4>First Thumbnail label</h4>
                                                                                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="title_content">
                                                                                <div class="text_content">Blog Post Gallery</div>
                                                                                <div class="clear"></div>
                                                                            </div>

                                                                            <p class="caps">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with.</p>

                                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                            <div class="col-md-12 first">
                                                                                <div class="info">
                                                                                    <div>
                                                                                        <span class="tag">#php</span>
                                                                                        <span class="tag">#web</span>
                                                                                        <span class="tag">#web design</span>
                                                                                    </div>


                                                                                    <ul class="info-post">
                                                                                        <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                        <li><i class="glyphicon glyphicon-time"></i> January 31, 2014</li>
                                                                                        <li><i class="glyphicon glyphicon-user"></i> by Jane Doe</li>
                                                                                        <li><i class="glyphicon glyphicon-tag"></i> jquery, slider, web design</li>
                                                                                    </ul>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="about_author">
                                                                                    <div class="title_content" style="margin-bottom:10px">
                                                                                        <div class="text_content">BILL GATES</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>

                                                                                    <div class="prg_content">
                                                                                        <img src="http://placehold.it/100x100" width="100" height="100" alt="img">

                                                                                        <div class="text">
                                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                                            adipiscing elit. Praesent condimentum sed elit
                                                                                            vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                            amet cursus libero. In fringilla egestas ornare.
                                                                                        </div>

                                                                                        <div class="nb_post" style="margin-top: 10px;">
                                                                                            <b id="nb_post"> 15 posts</b> created by author
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clear"></div>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="post_comments">

                                                                                    <div class="title_content">
                                                                                        <div class="text_content">7 Comments</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>

                                                                                    <div class="comments">

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Doe <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Smith <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->



                                                                                    </div><!-- .post_comments -->

                                                                                    <div class="clear"></div>      


                                                                                    <div class="comment_form">
                                                                                        <div class="title_content">
                                                                                            <div class="text_content">Leave A Comment</div>
                                                                                            <div class="clear"></div>
                                                                                        </div>


                                                                                        <form method="post" id="comment_form">
                                                                                            <p class="form-group" id="contact-name">
                                                                                                <label for="name">Your Name</label>
                                                                                                <input type="text" name="name" class="form-control" id="inputSuccess" placeholder="Name*...">
                                                                                            </p>
                                                                                            <p class="form-group" id="contact-email"> 
                                                                                                <label for="email">Your Email</label>
                                                                                                <input type="text" name="email" class="form-control" id="inputSuccess" placeholder="Email*...">
                                                                                            </p>

                                                                                            <p class="form-group" id="contact-message">
                                                                                                <label for="message">Your Message</label>
                                                                                                <textarea name="message" cols="88" rows="6" class="form-control" id="inputError" placeholder="Your Comment..."></textarea>
                                                                                            </p>
                                                                                            <input type="reset" name="reset" value="CLEAR" class="reset">
                                                                                            <!--<input type="submit" name="submit" value="Post Comment" class="submit">-->
                                                                                            <button class="submit" data-toggle="modal" data-target=".bs-example-modal-sm">Post Comment</button>
                                                                                        </form>                        
                                                                                        <div class="clear"></div>

                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-md-12" style="margin-top: 20px;">
                                                                                    <a href="#post-2" class="readmore" id="pagination"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                                                                    <a href="#" class="readmore disabled" id="pagination"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                                                                    <a href="#blog" class="readmore"><i class="glyphicon glyphicon-chevron-left"></i> All Posts</a>
                                                                                </div>

                                                                                <div class="clear"></div>

                                                                        </article>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </section>
                                                            <!-- End Page Blog - Post 1 -->

                                                            <!-- Page Blog - Post 2 -->
                                                            <section id="post-2-page" class="content-post" style="display: none">
                                                                <div class="row inner">

                                                                    <div class="col-md-12" style="width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;float: left;background: rgba(255, 255, 255, 0.8);padding-bottom: 15px;padding-top: 15px;">

                                                                        <article class="postPage">

                                                                            <div class="col-md-12 post_media">

                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-pencil"></span></a>
                                                                                </div>

                                                                            </div>

                                                                            <div class="title_content">
                                                                                <div class="text_content">BLOG ASIDE POST</div>
                                                                                <div class="clear"></div>
                                                                            </div>


                                                                            <p class="caps">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with.</p>

                                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                            <div class="col-md-12 first">
                                                                                <div class="info">
                                                                                    <div>
                                                                                        <span class="tag">#php</span>
                                                                                        <span class="tag">#web</span>
                                                                                        <span class="tag">#web design</span>
                                                                                    </div>


                                                                                    <ul class="info-post">
                                                                                        <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                        <li><i class="glyphicon glyphicon-time"></i> January 31, 2014</li>
                                                                                        <li><i class="glyphicon glyphicon-user"></i> by Jane Doe</li>
                                                                                        <li><i class="glyphicon glyphicon-tag"></i> php, web design</li>
                                                                                    </ul>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="about_author">
                                                                                    <div class="title_content" style="margin-bottom:10px">
                                                                                        <div class="text_content">BILL GATES</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>


                                                                                    <div class="prg_content">
                                                                                        <img src="http://placehold.it/100x100" width="100" height="100" alt="img">

                                                                                        <div class="text">
                                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                                            adipiscing elit. Praesent condimentum sed elit
                                                                                            vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                            amet cursus libero. In fringilla egestas ornare.
                                                                                        </div>

                                                                                        <div class="nb_post" style="margin-top: 10px;">
                                                                                            <b id="nb_post"> 15 posts</b> created by author
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clear"></div>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="post_comments">

                                                                                    <div class="title_content">
                                                                                        <div class="text_content">7 Comments</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>

                                                                                    <div class="comments">

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Doe <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Smith <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->



                                                                                    </div><!-- .post_comments -->

                                                                                    <div class="clear"></div>      


                                                                                    <div class="comment_form">

                                                                                        <div class="title_content">
                                                                                            <div class="text_content">Leave A Comment</div>
                                                                                            <div class="clear"></div>
                                                                                        </div>


                                                                                        <form method="post" id="comment_form">
                                                                                            <p class="form-group" id="contact-name">
                                                                                                <label for="name">Your Name</label>
                                                                                                <input type="text" name="name" class="form-control" id="inputSuccess" placeholder="Name*...">
                                                                                            </p>
                                                                                            <p class="form-group" id="contact-email"> 
                                                                                                <label for="email">Your Email</label>
                                                                                                <input type="text" name="email" class="form-control" id="inputSuccess" placeholder="Email*...">
                                                                                            </p>

                                                                                            <p class="form-group" id="contact-message">
                                                                                                <label for="message">Your Message</label>
                                                                                                <textarea name="message" cols="88" rows="6" class="form-control" id="inputError" placeholder="Your Comment..."></textarea>
                                                                                            </p>
                                                                                            <input type="reset" name="reset" value="CLEAR" class="reset">
                                                                                            <!--<input type="submit" name="submit" value="Post Comment" class="submit">-->
                                                                                            <button class="submit" data-toggle="modal" data-target=".bs-example-modal-sm">Post Comment</button>
                                                                                        </form>                        
                                                                                        <div class="clear"></div>

                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-md-12"  style="margin-top: 20px;">
                                                                                    <a href="#post-3" class="readmore" id="pagination"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                                                                    <a href="#post-1" class="readmore" id="pagination"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                                                                    <a href="#blog" class="readmore"><i class="glyphicon glyphicon-chevron-left"></i> All Posts</a>
                                                                                </div>

                                                                                <div class="clear"></div>

                                                                        </article>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </section>
                                                            <!-- End Page Blog - Post 2 -->

                                                            <!-- Page Blog - Post 3 -->
                                                            <section id="post-3-page" class="content-post" style="display: none">
                                                                <div class="row inner">

                                                                    <div class="col-md-12" style="width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;float: left;background: rgba(255, 255, 255, 0.8);padding-bottom: 15px;padding-top: 15px;">

                                                                        <article class="postPage">


                                                                            <div class="col-md-12 post_media">

                                                                                <div class="post-format-icon">
                                                                                    <a href="#" class="item-date"><span class="fa fa-picture-o"></span></a>
                                                                                </div>

                                                                                <div class="media">
                                                                                    <div class="he-wrap tpl2">
                                                                                        <img src="http://placehold.it/825x340" class="img-hover" alt="">
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <div class="title_content">
                                                                                <div class="text_content">BLOG POST IMAGE</div>
                                                                                <div class="clear"></div>
                                                                            </div>


                                                                            <p class="caps">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with.</p>

                                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                                                                            <div class="col-md-12 first">
                                                                                <div class="info">
                                                                                    <div>
                                                                                        <span class="tag">#php</span>
                                                                                        <span class="tag">#web</span>
                                                                                        <span class="tag">#web design</span>
                                                                                    </div>


                                                                                    <ul class="info-post">
                                                                                        <li><i class="glyphicon glyphicon-comment"></i> 2 Comments</li>
                                                                                        <li><i class="glyphicon glyphicon-time"></i> January 31, 2014</li>
                                                                                        <li><i class="glyphicon glyphicon-user"></i> by Jane Doe</li>
                                                                                        <li><i class="glyphicon glyphicon-tag"></i> Photoshop</li>
                                                                                    </ul>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="about_author">
                                                                                    <div class="title_content" style="margin-bottom:10px">
                                                                                        <div class="text_content">BILL GATES</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>


                                                                                    <div class="prg_content">
                                                                                        <img src="http://placehold.it/100x100" width="100" height="100" alt="img">

                                                                                        <div class="text">
                                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                                            adipiscing elit. Praesent condimentum sed elit
                                                                                            vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                            amet cursus libero. In fringilla egestas ornare.
                                                                                        </div>

                                                                                        <div class="nb_post" style="margin-top: 10px;">
                                                                                            <b id="nb_post"> 15 posts</b> created by author
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clear"></div>
                                                                                </div>

                                                                                <div class="clear"></div>      


                                                                                <div class="post_comments">

                                                                                    <div class="title_content">
                                                                                        <div class="text_content">7 Comments</div>
                                                                                        <div class="clear"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>

                                                                                    <div class="comments">

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Doe <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">John Smith <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="comment sub">
                                                                                                <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                                <div class="text">
                                                                                                    <div class="name">Bill Gates <a class="reply" href="#">Reply</a></div>
                                                                                                    <div class="date">12, September, 2013</div>
                                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                                    adipiscing elit. Praesent condimentum sed elit
                                                                                                    vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                    amet cursus libero. In fringilla egestas ornare.
                                                                                                </div>
                                                                                                <div class="clear"></div>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->

                                                                                        <div class="comment">
                                                                                            <img src="http://placehold.it/100x100" width="100" height="100" alt="img" />
                                                                                            <div class="text">
                                                                                                <div class="name">Andrian Robert <a class="reply" href="#">Reply</a></div>
                                                                                                <div class="date">12, September, 2013</div>
                                                                                                Lorem ipsum dolor sit amet, consectetur
                                                                                                adipiscing elit. Praesent condimentum sed elit
                                                                                                vitae tristique. Aliquam erat volutpat. Nunc sit
                                                                                                amet cursus libero. In fringilla egestas ornare.
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                        </div><!-- .comments -->



                                                                                    </div><!-- .post_comments -->

                                                                                    <div class="clear"></div>      


                                                                                    <div class="comment_form">

                                                                                        <div class="title_content">
                                                                                            <div class="text_content">Leave A Comment</div>
                                                                                            <div class="clear"></div>
                                                                                        </div>


                                                                                        <form method="post" id="comment_form">
                                                                                            <p class="form-group" id="contact-name">
                                                                                                <label for="name">Your Name</label>
                                                                                                <input type="text" name="name" class="form-control" id="inputSuccess" placeholder="Name*...">
                                                                                            </p>
                                                                                            <p class="form-group" id="contact-email"> 
                                                                                                <label for="email">Your Email</label>
                                                                                                <input type="text" name="email" class="form-control" id="inputSuccess" placeholder="Email*...">
                                                                                            </p>

                                                                                            <p class="form-group" id="contact-message">
                                                                                                <label for="message">Your Message</label>
                                                                                                <textarea name="message" cols="88" rows="6" class="form-control" id="inputError" placeholder="Your Comment..."></textarea>
                                                                                            </p>
                                                                                            <input type="reset" name="reset" value="CLEAR" class="reset">
                                                                                            <!--<input type="submit" name="submit" value="Post Comment" class="submit">-->
                                                                                            <button class="submit" data-toggle="modal" data-target=".bs-example-modal-sm">Post Comment</button>
                                                                                        </form>                        
                                                                                        <div class="clear"></div>

                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-md-12" style="margin-top: 20px;">
                                                                                    <a href="#" class="readmore disabled" id="pagination"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                                                                    <a href="#post-2" class="readmore" id="pagination"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                                                                    <a href="#blog" id="blog" class="readmore"><i class="glyphicon glyphicon-chevron-left"></i> All Posts</a>
                                                                                </div>

                                                                                <div class="clear"></div>

                                                                        </article>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </section>
                                                            <!-- End Page Blog - Post 3 -->




                                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h3 class="modal-title h3_modal" style="color: #fff !important;">FlexyVcard - Responsive Vcard Template</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>FlexyVcard is an impressive and professional online vcard, a beautiful portfolio with sliding effect, resume and contact information with Google map.</p>
                                                                        <p>It’s simple! Just download and install in a few minutes, you can show your online card to your friend, customer or employer in an interview by phone or tablet. Because FlexyVcard is a responsive template, you can view your website on pc as well as handheld devices. You can also link to your social profiles, display your portfolio in many media format such as image, youtube video, flash...</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>


                                                        </div>

                                            <!-- profile -->
                                            <div id="profile2" class="content_2">
                                                <!-- .title -->
                                                <h1 class="h-bloc">Profile - About Me</h1>

                                                <div class="row top-p">
                                                    <div class="col-md-6 profile-l">

                                                        <!--About me-->
                                                        <div class="title_content">
                                                            <div class="text_content"><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                            <div class="clear"></div>
                                                        </div>

                                                        <ul class="about">

                                                            <li>
                                                                <i class="glyphicon glyphicon-user"></i>
                                                                <label>Name</label>
                                                                <span class="value"><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <i class="glyphicon glyphicon-book" ></i>
                                                                <label>School</label>
                                                                <span class="value"><?php if($_SESSION['userprof']['hschool']==1) {
                                                                        echo "High School";
                                                                    } else {
                                                                        echo "College";
                                                                    }

                                                                     ?></span>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li> 
                                                                <i class="glyphicon glyphicon-map-marker"></i>
                                                                <label>State</label>
                                                                <span class="value"><?php echo htmlentities($_SESSION['userprof']['state'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <i class="glyphicon glyphicon-envelope"></i>
                                                                <label>Email</label>
                                                                <span class="value"><?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <i class="glyphicon glyphicon-phone"></i>
                                                                <label>Gender</label>
                                                                <span class="value"><?php if($_SESSION['userprof']['female']==1) {
                                                                        echo "Female";
                                                                    } else {
                                                                        echo "Male";
                                                                    }

                                                                     ?></span>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>

                                                                <?php if($_SESSION['user']['mentor']==1) {
                                                                        ?> <i class="glyphicon glyphicon-globe"></i>
                                                                <label>College</label>
                                                                <span class="value"><?php echo $_SESSION['useror']['college'] ?></span>
                                                                <div class="clear"></div>
                                                                    <?php } 
                                                    
                                                                     ?>

                                                                
                                                            </li>

                                                        </ul>


                                                        <p style="margin-bottom:20px">
                                                            
                                                            
                                                        </p>

                                                        <p style="margin-bottom:20px">
                                                            <i class="fa fa-quote-left"></i>       
                                                           <?php echo htmlentities($_SESSION['userprof']['me'], ENT_QUOTES, 'UTF-8'); 
                                                       
                                                           ?>

                                                        </p>
                                                        
                                                             <p style="margin-bottom:20px">
                                                            


                                                        </p> 

                                                    </div>
                                                    <!-- End left-wrap -->

                                                    <div  class="col-md-6 profile-r " >

                                                            
                                                            <img class="center-cropped2" id='profimg' style="background-image" src=<?php echo $_SESSION['userprof']['photo']; ?> alt="" />
                                                
                                                            <form action="insert_image.php" method="POST" enctype="multipart/form-data">
                                                            <label></label><input type="string" name="image" placeholder="Change Image URL"/>
                                                            <input type="submit" />
                                                            </form>
                                                    </div>

                                                </div>

                                                <div class="clear"></div>


                                                <div class="row" id="services">
                                                    <div class="col-md-12">
                                                        <div class="title_content">
                                                            <div class="text_content">Interests</div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                         <div class="col-md-4 pack-service center">
                                                            <div class="service">
                                                                <div class="service-icon"><i class="fa fa-book"></i></div>
                                                                <div class="service-detail">
                                                                    <h6>Academics</h6>
                                                                    <h6></h6>
                                                                    <?php 

                                                        if($_SESSION['userprof']['art']==1) {
                                                                        echo "<i class='fa fa-photo'></i> Art<br>";
                                                        } 
                                                        if($_SESSION['userprof']['biology']==1) {
                                                                        echo "<i class='fa fa-leaf'></i> Biology<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['chemistry']==1) {
                                                                        echo "<i class='fa fa-flask'></i> Chemistry<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['computers']==1) {
                                                                        echo "<i class='fa fa-laptop' Computers></i><br>";
                                                                    }             
                                                        if($_SESSION['userprof']['engineering']==1) {
                                                                        echo "<i class='fa fa-cogs'></i> Engineering<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['economics']==1) {
                                                                        echo "<i class='fa fa-dollar'></i> Economics <br>";
                                                                    } 
                                                        if($_SESSION['userprof']['english']==1) {
                                                                        echo "<i class='fa fa-pencil'></i> English<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['history']==1) {
                                                                        echo "<i class='fa fa-backward'></i> History<br>";
                                                                    } 

                                                        if($_SESSION['userprof']['literature']==1) {
                                                                        echo "<i class='fa fa-book'></i> Literature<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['math']==1) {
                                                                        echo "<i class='fa fa-table'></i> Math<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['music']==1) {
                                                                        echo "<i class='fa fa-music'></i> Music<br>";
                                                                    } 
                                                        if($_SESSION['userprof']['physics']==1) {
                                                                        echo "<i class='fa fa-bolt'></i> Physics<br>";
                                                                    } 
                                                        
                                                    
                                                        
                                                       
                                                        
                                                        
                                                        
                                                        
                                                        

                                                                     
                                                       ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pack-service">
                                                            <div class="service center">
                                                                <div class="service-icon"><i class="fa fa-star"></i></div>
                                                                <div class="service-detail">
                                                                    <h6>Extracurriculars</h6>
                                                                    <h6></h6>
                                                                    <?php echo $_SESSION['userprof']['extra1']."<br>"; ?>
                                                                    <?php echo $_SESSION['userprof']['extra2']."<br>"; ?>
                                                                    <?php echo $_SESSION['userprof']['extra3']."<br>"; ?>
                                                                    <?php echo $_SESSION['userprof']['extra4']."<br>"; ?>
                                                                    <?php echo $_SESSION['userprof']['extra5']."<br>"; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 pack-service">
                                                            <div class="service center">
                                                                <div class="service-icon"><i class="fa fa-smile-o"></i></div>
                                                                <div class="service-detail">
                                                                
                                                                    <h6>Favorite Animals</h6>
                                                                    <h6></h6>
                                                                    <p>Panda Bear</p>
                                                                    <p>Brown Bear</p>
                                                                    <p>Black Bear</p>
                                                                    <p>Polar Bear</p>
                                                                    <p>Grizzly Bear</p>                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                         

                                                        


                                                        
                                                    </div> 
                                                </div><!-- End Services -->


                                                <div class="clear"></div>
                                                <div class="border-list"></div>

                                                <div class="row" id="services">
                                                   
                                                </div>    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="bottom-p">
                                                            <div class="title_content">
                                                                <div class="text_content">Mentoring Details</div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="panel-group" id="accordion">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapse_tabs">
                                                                                I'd value a mentor in...
                                                                                <i class="glyphicon glyphicon-chevron-up" style="float: right;font-size: 13px;"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseOne" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
                                                                           
                                                                           <?php  if($_SESSION['userprof']['academics']==1) {
                                                                        echo "Academics <br>";

                                                                    }       
                                                                    if($_SESSION['userprof']['applications']==1) {
                                                                        echo "Applications <br>";
                                                                    }
                                                                    if($_SESSION['userprof']['careers']==1) {
                                                                        echo "Careers <br>";
                                                                    } 
                                                                    if($_SESSION['userprof']['scholarship']==1) {
                                                                        echo "Scholarships <br>";
                                                                    } 
                                                                     if($_SESSION['userprof']['sociallife']==1) {
                                                                        echo "Social Life <br>";
                                                                    } 
                                                                    
                                                                    
                                                                    if($_SESSION['userprof']['transitioning']==1) {
                                                                        echo "Transitioning to College <br>";
                                                                    } 
                                                                    

                                                                    ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapse_tabs">
                                                                                My Availability...
                                                                                <i class="glyphicon glyphicon-chevron-down" style="float: right;font-size: 13px;"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                          

                                                                 <?php  if($_SESSION['userprof']['saturdays']==1) {
                                                                        echo "Saturdays <br>";

                                                                    }       
                                                                    if($_SESSION['userprof']['sundays']==1) {
                                                                        echo "Sundays <br>";
                                                                    }
                                                                    if($_SESSION['userprof']['weekdays']==1) {
                                                                        echo "Weekdays <br>";
                                                                    } 
                                                                    
                                                                    

                                                                    ?>





                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapse_tabs">
                                                                                Time each week I'd like to mentor...
                                                                                <i class="glyphicon glyphicon-chevron-down" style="float: right;font-size: 13px;"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                           
                                                                            <?php
                                                                                

                                                                                switch ($_SESSION['userprof']['time']) {
                                                                                    case 1:
                                                                                        echo "15-30 Minutes";
                                                                                        break;
                                                                                    case 2:
                                                                                        echo "30-45 Minutes";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "45-60 Minutes";
                                                                                        break;
                                                                                    case 4:
                                                                                        echo "1-1.5 Hours";
                                                                                        break;
                                                                                    case 5:
                                                                                        echo "1.5-3 Hours";
                                                                                        break;
                                                                                    case 6:
                                                                                        echo "3+ Hours";
                                                                                        break;
                                                                                }
                                                                                ?>
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>

                                            </div>
                                            <!-- End .profile -->

                                            <!-- .resume -->
                                            <div id="portfolio" class="content_2">

                                                <!-- .title -->
                                                <h1 class="h-bloc">My Mentees</h1> 
                                                
                                                <div class="container-portfolio">
                                                <?php 
                                                include("searchmentors.php");
                                                get_mentees();

                                                ?>

                                                  
                                                    <?php if(!$_SESSION['menteesid'][0]==0) {
                                                    ?> <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src=<?php echo $_SESSION['menteesprof'][0]['photo']; ?> alt"Add More Mentors"/>
                                                            <a href="#"> <div class="mask" rel="portfolio" >
                                                               
                                                                <h2><?php echo $_SESSION['menteesnames'][0]['username']; ?></h2>
                                                                <p><?php echo $_SESSION['menteesnames'][0]['email']; ?></p>
                                                                
                                                            </div></a>
                                                            </div> 
                                                    <?php } else { ?>
                                                        <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src="img/bear-farbe.svg" />
                                                            <div class="mask">
                                                                <h2>More MenteeBears</h2>
                                                                <p>Coming Soon</p>
                                                            </div>
                                                        </div> 
                                                        <?php } ?>  


                                                    <?php if(!$_SESSION['menteesid'][1]==0) {
                                                    ?> <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src=<?php echo $_SESSION['menteesprof'][1]['photo']; ?> alt"Add More Mentors"/>
                                                            <a href="#"> <div class="mask" rel="portfolio" >
                                                               
                                                                <h2><?php echo $_SESSION['menteesnames'][1]['username']; ?></h2>
                                                                <p><?php echo $_SESSION['menteesnames'][1]['email']; ?></p>
                                                                
                                                            </div></a>
                                                            </div> 
                                                    <?php } else { ?>
                                                        <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src="img/bear-farbe.svg" />
                                                            <div class="mask">
                                                                <h2>More MenteeBears</h2>
                                                                <p>Coming Soon</p>
                                                            </div>
                                                        </div> 
                                                        <?php } ?>  
    
                                                    <?php if(!$_SESSION['menteesid'][2]==0) {
                                                    ?> <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src=<?php echo $_SESSION['menteesprof'][2]['photo']; ?> alt"Add More Mentors"/>
                                                            <a href="#"> <div class="mask" rel="portfolio" >
                                                               
                                                                <h2><?php echo $_SESSION['menteesnames'][2]['username']; ?></h2>
                                                                <p><?php echo $_SESSION['menteesnames'][2]['email']; ?></p>
                                                                
                                                            </div></a>
                                                            </div> 
                                                    <?php } else { ?>
                                                        <div class="view view-first portfolio logo" data-cat="logo">
                                                            <img src="img/bear-farbe.svg" />
                                                            <div class="mask">
                                                                <h2>More MenteeBears</h2>
                                                                <p>Coming Soon</p>
                                                            </div>
                                                        </div> 
                                                        <?php } ?>  
    

                                               
                                                </div>

                                                
                                            </div>
                                            <!-- End .resume -->

                                            <!-- .portfolio -->

                                            
                                            
                                            <!-- End .contact -->

                                        </div>
                                        <!-- End #resp-tabs-container --> 

                                    </div><!-- End verticalTab -->

                                </div><!-- End flexy_content -->


                            </div><!-- End row -->

                        </div><!-- End col-md-12 -->

                    </div><!-- End row -->

                </div><!-- End container -->

            </section>
            <!-- End Content -->

        </div>
        <!-- End wrapper -->


        <!-- jquery | jQuery 1.11.0 -->
        <!-- Credits: http://jquery.com -->
        <script type="text/javascript" src="js/jquery.min.js"></script>

        <!-- Js | bootstrap -->
        <!-- Credits: http://getbootstrap.com/ -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 

        <!-- Js | jquery.cycle -->
        <!-- Credits: https://github.com/malsup/cycle2 -->
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script type="text/javascript" src="js/easyResponsiveTabs2.js"></script>
        <!-- jquery | rotate and portfolio -->
        <!-- Credits: http://jquery.com -->
        <script type="text/javascript" src="js/jquery.mixitup.min.js"></script> 
        <script type="text/javascript" src="js/HeadImage.js"></script>

        <!-- Js | easyResponsiveTabs -->
        <!-- Credits: http://webtrendset.com/demo/easy-responsive-tabs/Index.html -->
        <script type="text/javascript" src="js/easyResponsiveTabs.min.js"></script>     

        <!-- Js | mCustomScrollbar -->
        <!-- Credits: http://manos.malihu.gr/jquery-custom-content-scroller -->
        <script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>     

        <!-- jquery | prettyPhoto -->
        <!-- Credits: http://www.no-margin-for-errors.com/ -->
        <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

        <!-- Js | gmaps -->
        <!-- Credits: http://maps.google.com/maps/api/js?sensor=true-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="js/gmaps.min.js"></script>

        <!-- Js | Js -->
        <!-- Credits: http://themeforest.net/user/FlexyCodes -->
        <script type="text/javascript" src="js/main.js"></script>

        <!-- code js for image rotate -->
        <script type="text/javascript">

            var mouseX;
            var mouseY;
            var imageOne;

            /* Calling the initialization function */
            $(init);

            /* The images need to re-initialize on load and on resize, or else the areas
             * where each image is displayed will be wrong. */
            $(window).load(init);
            $(window).resize(init);

            /* Setting the mousemove event caller */
            $(window).mousemove(getMousePosition);

            /* This function is called on document ready, on load and on resize
             * and initiallizes all the images */
            function init() {

                /* Instanciate the mouse position variables */
                mouseX = 0;
                mouseY = 0;

                /* Instanciate a HeadImage class for every image */
                imageOne = new HeadImage("one");

            }

            /* This function is called on mouse move and gets the mouse position. 
             * It also calls the HeadImage function to display the correct image*/
            function getMousePosition(event) {

                /* Setting the mouse position variables */
                mouseX = event.pageX;
                mouseY = event.pageY;

                /*Calling the setImageDirection function of the HeadImage class
                 * to display the correct image*/
                imageOne.setImageDirection();

            }

        </script>


        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </body>
</html>


