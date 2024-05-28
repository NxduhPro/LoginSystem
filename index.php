                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Wordle Pinoy</title>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                  <!-- Bootstrap CSS CDN -->
                                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
                                                        
                                <!-- Font Awesome JS -->
                                <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
                                <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
                                <style>
                                body{background: linear-gradient(to bottom, #edf2fb, #d7e3fc, #ccdbfd, #c1d3fe, #abc4ff); min-height:100dvh}
                                ::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
                                *{padding:0;margin:0;font-family: 'Poppins', sans-serif}
                                section{position:relative;display:flex;justify-content:center;align-items:center;padding-top: 20px;}
                                section .container{overflow:hidden;position:relative;width:800px;height:500px;background-color:#fff;box-shadow:0 15px 50px rgba(0,0,0,0.1);}
                                section .container .user{position:absolute;top:0;left:0;width:100%;height:100%;display:flex}
                                section .container .user .imagebox{position:relative;width:50%;height:100%;transition:1s}
                                section .container .user .imagebox img{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover}
                                section .container .user .formbox{position:relative;width:50%;height:100%;background-color:#fff;display:flex;justify-content:center;align-items:center;padding:40px;transition:1s}
                                section .container .user .formbox .form h2{font-size:22px;font-weight:800;letter-spacing:2px;text-transform:uppercase;text-align:center;margin-bottom:15px;color:#555}
                                section .container .user .formbox .form input{position:relative;width:100%;height:50px !important;padding:0px 10px;background-color:#f5f5f5;color:#333;border:none;outline:none;margin:10px 0;box-shadow:none;letter-spacing:1px;font-weight:400;font-size:14px}
                                section .container .user .formbox .form input[type='submit']{max-width:100px;background-color:#677eff;color:#fff;cursor:pointer}
                                section .container .user .formbox .form .signup-text{position:relative;margin-top:10px;font-size:12px;letter-spacing:1px;color:#555;text-transform:uppercase}
                                section .container .user .formbox .form .signup-text a{text-decoration:none;color:#677eff;cursor:pointer}
                                section .container .signupbox{pointer-events:none}
                                section .container.active .signupbox{pointer-events:initial}
                                section .container .signupbox .formbox{left:100%}
                                section .container.active .signupbox .formbox{left:0}
                                section .container .signupbox .imagebox{left:-100%}
                                section .container.active .signupbox .imagebox{transform:rotate(360deg);left:0}
                                section .container.active .signupbox + .main-section{background-color:blue !important}
                                section .container .signinbox .formbox{left:0}
                                section .container.active .signinbox .formbox{left:100%;transform:rotate(360deg)}
                                section .container .signinbox .imagebox{left:0}
                                section .container.active .signinbox .imagebox{left:-100%}
                                @media (max-width:750px){section .container{max-width:400px}section .container .imagebox{display:none}section .container .user .formbox{width:100%}}
                                
                                footer {
                                  background-color: #333;
                                  color: #fff;
                                  padding: 2px;
                                  position: absolute;
                                  bottom: 0;
                                  width: 100%;
                                }
                                
                                </style>
                                </head>
                                <body className='snippet-body'>
                                <section class="main-section"> 
                                  <div class="container">
                                    <div class="user signinbox"> 
                                      <div class="imagebox"> 
                                        <img src="Login.png"> 
                                      </div> 
                                      
                                      <div class="formbox"> 
                                        <div class="form"> 
                                        <form action="login.php" method="post">
                                          <h2>Signin</h2> 
                                          <input type="text" placeholder="username"  name="username" id="username" required style="border: solid 1px gray;"> 
                                          <input type="password" placeholder="password" name="password" id="password" required style="border: solid 1px gray;"> 
                                          <input type="submit" value="Login" > 
                                          <p class="signup-text">Don't have an account? 
                                            <a href="#" onClick="toggleform();">Signup</a>
                                          </p> 
                                        </form>
                                        </div> 
                                      </div> 
                                    </div> 
                                    
                                    <div class="user signupbox"> 
                                      <div class="formbox"> 
                                        <div class="form"> 
                                          <form action="signup.php" method="post">
                                          <h2>Signup</h2> 
                                          <input type="text" placeholder="username" id="username" name="username" required style="border: solid 1px gray;"> 
                                          <input type="email" placeholder="email" id="email" name="email" required style="border: solid 1px gray;"> 
                                          <input type="password" placeholder="password" id="password" name="password" style="border: solid 1px gray;"> 
                                          <input type="submit" value="Signup"> 
                                          <p class="signup-text">Already have an account? 
                                            <a href="#" onClick="toggleform();">Login</a>
                                          </p> 
                                        </form>
                                        </div> 
                                      </div> 
                                      
                                      <div class="imagebox"> 
                                        <img src="Login.png"> 
                                      </div> 
                                      
                                    </div> 
                                  </div>
                                </section>
                              <footer style="font-size: 10px;">
                                © 2024-present Neil Andrei S. All Rights Reserved. 
                              </footer>
                                <script type='text/javascript'>function toggleform(){
                                    var container = document.querySelector('.container');
                                    container.classList.toggle('active');
                                }
                                </script>

                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });
                                </script>
                            
                                </body>
                            </html>