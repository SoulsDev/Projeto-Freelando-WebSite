<style>
    .input-pesquisa {
        width: 300px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        border: 1px solid #515151 !important;
        opacity: 50% !important;
        margin: 0 !important;
    }
    
    .btn-navi {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .logo {
        display: none;
    }
    
    .container-lupa {
        width: 293px !important;
        display: flex !important;
        justify-content: end !important;
        position: absolute !important;
    }
    
    .lupa {
        margin-top: 6px !important;
        border-left: 2px solid #515151 !important;
        border-radius: 0px !important;
        padding-left: 4px !important;
        opacity: 100% !important;
        position: absolute !important;
        padding: 2 !important;
    }
    
    .nav-custom {
        -webkit-box-shadow: 0px 12px 39px -10px #fffafa !important;
        box-shadow: 0px 12px 39px -10px #e0e0e0 !important;
        z-index: 1000000 !important;
        background-color: #fff;
        width: 100vw;
        margin-bottom: 3rem !important;
        position: fixed;
    }
    
    .container-nave {
        display: flex !important;
        align-items: center !important;
        justify-content: space-evenly !important;
        flex-direction: row !important;
        padding-left: 300px;
        padding-right: 300px;
    }
    
    .container-opçoes {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-around !important;
        align-items: end !important;
    }
    
    .foto-user-navi {
        padding: 0 !important;
        margin-right: 0.5rem !important;
    }
    
    .nome-user-navi {
        padding: 0 !important;
        margin-bottom: 0.5rem !important;
        margin-right: 1rem !important;
        font-family: Verdana, Geneva, Tahoma, sans-serif !important;
    }
    
    .chat-user-navi {
        padding: 0 !important;
        margin-bottom: 0.25rem !important;
        margin-right: 1rem !important;
    }
    
    .sair-user-navi {
        padding: 0 !important;
        margin-bottom: 0.25rem !important;
    }
    
    .margem-t {
        height: 200px !important;
        content: "" !important;
    }
    
    .container-pesquisa {
        display: flex !important;
        flex-direction: row !important;
    }

    .clicavel:hover{
        cursor: pointer;
    }
    /* Wider than desktop */
    
    @media (min-width: 1200px) {}
    /* Landscape phone to desktop */
    
    @media (max-width: 1199px) {}
    /* Landscape phone to landscape tablet */
    
    @media (max-width: 979px) {}
    /* Small desktop */
    
    @media (min-width: 980px) and (max-width: 1199px) {
        .nome-user-navi {
            display: none !important;
        }
        .foto-user-navi {
            padding: 0 !important;
            margin-right: 1rem !important;
        }
        .container-nave {
            padding-left: 0px;
            padding-right: 0px;
        }
    }
    /* Portrait tablet to landscape tablet */
    
    @media (min-width: 768px) and (max-width: 979px) {
        .nome-user-navi {
            display: none !important;
        }
        .foto-user-navi {
            padding: 0 !important;
            margin-right: 1rem !important;
        }
        .container-nave {
            padding-left: 0px;
            padding-right: 0px;
        }
    }
    /* Landscape phone to portrait tablet */
    
    @media (max-width: 767px) {
        .nome-user-navi {
            display: none !important;
        }
        .foto-user-navi {
            padding: 0 !important;
            margin-right: 1rem !important;
        }
        .container-nave {
            padding-left: 0px;
            padding-right: 0px;
        }
    }
    /* Landscape phones and smaller */
    
    @media (max-width: 480px) {
        .nome-user-navi {
            display: none !important;
        }
        .foto-user-navi {
            padding: 0 !important;
            margin-right: 1rem !important;
        }
        .container-nave {
            padding-left: 0px;
            padding-right: 0px;
        }
    }

</style>
<body>

    <nav class="nav-custom">
        <div class="container-nave">

            <div class="imagem clicavel" onclick="telaHome()">
                <img src="../medias/img/freelando.svg" style="margin-bottom: 1rem !important;" alt="logo" height="50px" width="200px">

            </div>


            <div class="logo clicavel" onclick="telaHome()">
                <img src="../medias/img/logo-tocha.svg" style="margin-bottom: 1rem !important;" alt="logo" height="50px" width="200px">

            </div>




            <div class="container-pesquisa ">
                <input type="text" name="pesquisa" class="input-pesquisa ">

                <div class="container-lupa">
                    <img src="../medias/img/lupinha.svg" class="lupa">
                </div>
            </div>


            <div class="container-opçoes">
                <img src="<?php echo $_SESSION['foto_perfil']; ?>" alt="usuario" width="40px" height="40px" class="btn-navi foto-user-navi">

                <p class="btn-navi nome-user-navi" id="username" onclick="profile()"><?php echo $_SESSION['nome_usuario']; ?></p>

                <img src="../medias/img/balao-de-fala.svg" alt="balao" width="33px" height="33px" class="btn-navi chat-user-navi">

                <img src="../medias/img/sair_2.png" alt="saida" width="33px" height="33px" class="btn-navi mb-1 p-0 " onclick="logoff()">
            </div>
        </div>
    </nav>

    <div class="margem-t"></div>
</body>
<script src="../scripts/scripts.js"></script>