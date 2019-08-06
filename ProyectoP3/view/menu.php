<?php
$roll = "";
?>
<nav class="navbar navbar-expand-sm bg-ligh navbar-light">
    <a class="navbar-brand">Control de Crónicos</a>
    <ul class="navbar-nav">
        <?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->url("home","index"); ?>">Ver Agenda</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="SMAgendar" data-toggle="dropdown">
                Agendar
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo $this->url("agenda","Show"); ?>">Editar</a>
                <a class="dropdown-item" href="<?php echo $this->url("agenda","Add"); ?>">Agregar</a>
            </div>
        </li>    

             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMPersona" data-toggle="dropdown">
                    Personas
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("persona","Show"); ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo $this->url("persona","Add"); ?>">Agregar</a>
                 </div>
             </li>      
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMPaciente" data-toggle="dropdown">
                    Pacientes
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("cliente","Show"); ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo $this->url("cliente","Add"); ?>">Agregar</a>
                 </div>
             </li>      

             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMDoctor" data-toggle="dropdown">
                    Doctores
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("doctor","Show"); ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo $this->url("doctor","Add"); ?>">Agregar</a>
                 </div>
             </li>      
            
                      
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMUsuario" data-toggle="dropdown">
                   Usuarios
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("usuario","Show"); ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo $this->url("usuario","Add"); ?>">Agregar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="login/salir.php">Salir</a>
            </li>
            <?php  $roll = "ADMIN"; ?>
        <?php endif; ?>
        <?php if ($_SESSION['usuario']['fk_idrol'] == 2): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->url("home","index"); ?>">Ver Agenda</a>
            </li>

             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMAgendar" data-toggle="dropdown">
                    Agendar
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("agenda","Show"); ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo $this->url("agenda","Add"); ?>">Agregar</a>
                 </div>
             </li>    

             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMPersona" data-toggle="dropdown">
                    Personas
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("persona","Show"); ?>">Ver</a>

                 </div>
             </li>      
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMPaciente" data-toggle="dropdown">
                    Pacientes
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("paciente","Show"); ?>">Ver</a>
                 </div>
             </li>      

             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="SMDoctor" data-toggle="dropdown">
                    Doctores
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->url("doctor","Show"); ?>">Ver</a>
                 </div>
             </li>      
            
            <li class="nav-item">
                <a class="nav-link" href="login/salir.php">Salir</a>
            </li>
            <?php  $roll = "DEPENDIENTE"; ?>
        <?php endif; ?>
    </ul>
    </div>
</nav>


 