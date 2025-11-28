<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Estilos Generales */
        body {
            background-color: #19123B;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center; /* Centrar verticalmente */
        }

        .card {
            border: none;
            border-top: 5px solid rgb(176, 106, 252);
            background: #212042;
            color: #57557A;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border-radius: 10px;
        }

        p {
            font-weight: 600;
            font-size: 15px;
            color: #8D8BBD;
            letter-spacing: 1px;
        }

        /* Botones Redes Sociales */
        .social-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #2A284D;
            height: 50px;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
            text-decoration: none;
            font-size: 20px;
        }

        .social-btn:hover {
            background: #363463;
            transform: translateY(-2px);
            cursor: pointer;
        }

        .fa-twitter { color: #56ABEC; }
        .fa-facebook { color: #1775F1; }
        .fa-google { color: #CB5048; }

        /* Divisor flexible (Mejorado) */
        .division {
            display: flex;
            align-items: center;
            text-align: center;
            color: #57557A;
            margin: 30px 0 20px 0;
        }

        .division::before,
        .division::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #57557A;
        }

        .division span {
            padding: 0 10px;
            font-weight: 600;
            font-size: 12px;
            white-space: nowrap;
        }

        /* Formulario */
        .myform {
            padding: 0 10px;
        }

        .form-control {
            background: #2A284D;
            border: 1px solid #3e3c6e;
            color: #fff;
            height: 50px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            background: #2A284D;
            border-color: rgb(176, 106, 252);
            box-shadow: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #57557A;
        }

        .bn {
            text-decoration: none;
            color: #8D8BBD;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .bn:hover {
            color: #fff;
        }

        /* Checkbox personalizado */
        .form-check-input {
            background-color: #2A284D;
            border-color: #57557A;
        }
        .form-check-label {
            font-size: 14px;
            color: #8D8BBD;
        }

        /* Botón Principal */
        .btn-primary {
            background: linear-gradient(135deg, rgba(176, 106, 252, 1) 39%, rgba(116, 17, 255, 1) 101%);
            border: none;
            border-radius: 50px;
            height: 50px;
            width: 100%; /* Reemplaza btn-block */
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }

        .btn-primary:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, rgba(176, 106, 252, 1) 20%, rgba(116, 17, 255, 1) 100%);
        }

        .btn-primary small {
            color: #fff;
            font-size: 16px;
        }

        /* Responsividad */
        @media(min-width: 767px) {
            .forgot-pass-container {
                text-align: right;
            }
        }
        
        @media(max-width: 767px) {
            .forgot-pass-container {
                text-align: center;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card py-4 px-3">
                    
                    <p class="text-center mb-4">Login</p>
                    
                    <div class="row mx-auto w-100">
                        <div class="col-4 px-1">
                            <a href="#" class="social-btn">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#" class="social-btn">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#" class="social-btn">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </div>

                    <div class="division">
                        <span>Introduce tu email</span>
                    </div>

                    <form class="myform">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        
                        <div class="row align-items-center mb-4">
                            <div class="col-md-6 col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 forgot-pass-container">
                                <a href="#" class="bn">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <small><i class="far fa-user pe-2"></i>Entrar</small>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>