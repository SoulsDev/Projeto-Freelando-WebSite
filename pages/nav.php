<!-- <link rel="stylesheet" href="../bootstrap-5.1.3/dist/css/bootstrap.css"> -->
<style>
    .nav-item {
        margin: 0 10px;
        cursor: pointer;
    }
    
    .navbar-expand {
        background: white;
    }
    
    .form-lupa {
        border-radius: 8px;
    }
    
    .has-lupa .form-lupa {
        padding-right: 2.375rem;
        border-color: #515151;
    }
    
    .has-lupa .lupinha {
        position: absolute;
        z-index: 10000000;
        display: block;
        width: 2.000rem;
        height: 1.400rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        margin-top: 15px;
        margin-left: 200px;
        border-left: 2px solid #515151;
        color: #515151;
    }
    
    .has-lupa .lupinha:focus {
        border-color: none;
        box-shadow: none;
    }
    
    .logo {
        display: none;
    }
    
    .form-control {
        padding-right: 40px;
    }
    
    @media (max-width:1000px) {
        .logo {
            display: inline;
        }
        .img {
            display: none;
        }
        .nome {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand">



    <div class="container container-1 d-flex justify-content-evenly">


        <img src="../medias/img/freelando.svg" alt="freelando" width="
                180px" height="50px" class="navbar-brand img">



        <img src="../medias/img/logo-tocha.svg" alt="freelando" width="
                    180px" height="50px" class="navbar-brand logo">



        <div class="form-lupa has-lupa ">
            <svg class="lupinha" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
            <input type="text" class="form-control lupa-input" placeholder="">
        </div>


        <div class="icone">
            <img src="../medias/img/Group 133.svg" alt="nome" class="nav-item"><span id="nome-usuario" class="nome">Robson Silva</span>

            <img src="../medias/img/balao-de-fala.svg" alt="" class="nav-item">

            <img src="../medias/img/sair_2.png" alt="saida" width="30px" height="30px" class="nav-item">
        </div>

    </div>
</nav>