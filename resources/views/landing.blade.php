<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="icon" href="https://www.freepnglogos.com/uploads/starbucks-logo-png-25.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Starbucks Store</title>
        <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <footer>
                    <div class="starbucks">
                            <h2 style="color: #017143;" >STARBUCKS</h2></div>
                            <br>
                    <div class="content">
                        
                        <div class="sec aboutus">
                            <h2>About Us</h2>
                            <p>American company that is the largest coffeehouse chain in the world. Its headquarters are
                                 in Seattle, Washington.</p>
                        </div>
                        
                        <div class="sec quickLinks">
                            <h2>Quick Links</h2>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Terms & Consitions</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="sec contact">
                            <h2 >Contact Info</h2>
                            <ul class="info">
                                <li>
                                    <span><i class="fa fa-map-marker" aria-hidden="true"> 55 saas street<br>Riche,Pa 15247,<br>MAROC</i></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-envelope-o" aria-hidden="true"> starbucks@gmail.com</i></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone" aria-hidden="true"> +0570854134</i></span>
                                   <!-- <p><a href="#">+1670854134</a><br>
                                    <a href="#">+1680248616</a></p>-->
                                </li>
                            </ul>
        
                        </div>
                      
                    </div>
                   
                </footer>
        <script src="{{ mix('js/bootstrap.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
    </html>

    <style>
     footer{
    position:relative;
    width:100%;
    height:auto;
    padding:50px 100px;
    background:#111;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.starbucks{
    color: #017143;
    position: relative;
    top: 9px;
    left: 26px;
    margin: -33px;
    padding: 0px;
    margin-left: -112px;
}
footer.content{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    flex-direction: row;

}
footer .content .sec{
    margin-right:30px;
}
footer .content .sec.aboutus{
    width: 40%;
}
footer .content h2{
    position:relative;
    color:#fff;
    font-weight:500;
    margin-bottom:15px;
}
footer .content h2:before{
    content:'';
    position:absolute;
    bottom: -5px;
    left:0;
    width:50px;
    height: 2px;
    background:#457854;
}
footer p{
    color:#999;
}
.quickLinks{
    position:relative;
    width:25%;
}
.quickLinks ul li {
    List-style:none;
}
.quickLinks ul li a{
    color:#999;
    text-decoration:none;
    margin-bottom:10px;
    display:inline-block;
}
.quickLinks ul li a:hover{
    color:#fff;
}
.contact{
    width: calc(35% -60px);
    margin-right:0 !important;
}
.contact.info
{
    position: relative;
}
.contact.info li{
    display:flex;
    margin-bottom:16px;
}
.contact.info li span:nth-child(1){
    color:#fff;
    font-size:20px;
    margin-right:10px;
}
.contact.info li span{
    color:#999;

}
.contact.info li span a{
    color:#999;
    text-decoration:none;
}
.contact.info li a:hover{
    color:#fff;
}
.info li {
    color:#999;
}
.copyrightText{
    width: 100%;
    height:40px;
    background:#181818; 
    padding:8px 100px;
    text-align:center;
    color:#999;}



        @media (max-width : 991px){
            header{
                padding: 40px;
            } 
            section {
                padding: 150px 40px;
                
            }
            .sci {
                left: 40px;
            }
            .content{
                flex-direction: column;
            }
            .content .imgBox,
            .content .textBox {
                max-width: 100%;
            }
            .swiper-slide {
                height: 300px;
            }
            header .navigation{
                display: none;
            } 
            section .circle{
                height: 53%;
            }
            .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl{
                width:100%;
            }
            .toggle{
                position: relative;
                width: 30px;
                height: 30px;
                background:url(img/menu.png) ;
                background-size: 30px;
                background-repeat: no-repeat;
                background-position:center ;
                cursor: pointer;
                z-index: 10000;
            }
            .toggle.active{
                position: fixed;
                right: 40px;
                background:url(img/close.png) ;
                background-size: 25px;
                background-repeat: no-repeat;
                background-position:center ;
            }
            header .navigation.active{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #017143;
                display: flex;
                z-index: 10;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            header .navigation li a {
                margin-left: 0;
                margin: 10px 0;
                font-size: 1.5em;
                font-weight: 300;
            }
            
        }
            .icon-cart{
                display :block;
                font-size:1.25rem;
            }
        @keyframes animate{
            0%{
                width: 0px;
                height: 0px;
                opacity: 0.5;
            }
            100%{
                width: 500px;
                height: 500px;
                opacity: 0;
            }

        }

        </style>