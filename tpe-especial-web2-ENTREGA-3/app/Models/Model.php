<?php
require_once './config.php' ;
class Model {
  
    protected $db ;

    function __construct(){
      $this->db = new PDO('mysql:host='. MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8',MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    function deploy () {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); 
        if(count($tables)==0){
            ?>
            $sql = <<<END
            CREATE TABLE `clubspoes` (
                `club_id` int(11) NOT NULL,
                `Club` text NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
              
              --
              -- Volcado de datos para la tabla `clubes`
              --
              
              INSERT INTO `clubes` (`club_id`, `Club`) VALUES
              (2, 'River Plate'),
              (3, 'San lorenzo'),
              (22, 'Boca Juniors');
              
              -- --------------------------------------------------------
              
              --
              -- Estructura de tabla para la tabla `jugadores`
              --
              
              CREATE TABLE `jugadores` (
                `id_jugador` int(11) NOT NULL,
                `Nombre_Apellido` text NOT NULL,
                `Edad` int(11) NOT NULL,
                `Goles` int(11) NOT NULL,
                `club_id` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
              
              --
              -- Volcado de datos para la tabla `jugadores`
              --
              
              INSERT INTO `jugadores` (`id_jugador`, `Nombre_Apellido`, `Edad`, `Goles`, `club_id`) VALUES
              (5, 'Vanpersi', 20, 5, 2),
              (6, 'Branchen del Piero', 24, 3, 2),
              (7, 'Jalil Elías', 27, 1, 3),
              (17, 'Javier Mendoza', 20, 5, 3);
              
              -- --------------------------------------------------------
              
              --
              -- Estructura de tabla para la tabla `usuarios`
              --
              
              CREATE TABLE `usuarios` (
                `id_usuario` int(11) NOT NULL,
                `usuario` varchar(15) NOT NULL,
                `password` mediumtext NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
              
              --
              -- Volcado de datos para la tabla `usuarios`
              --
              
              INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`) VALUES
              (8, 'webadmin', '$2y$10$KrOaio3xeetYvRRQQwTuA.hgG698ZK.C9Kro2MG1lXp83heRGEtzi'),
              (9, 'webadmin', '$2y$10$WhNkASdGZtmu1IQu6TmubuKOWww103VBJCQzs5pFx87fWvcoehTH2');
              
              --
              -- Índices para tablas volcadas
              --
              
              --
              -- Indices de la tabla `clubes`
              --
              ALTER TABLE `clubes`
                ADD PRIMARY KEY (`club_id`);
              
              --
              -- Indices de la tabla `jugadores`
              --
              ALTER TABLE `jugadores`
                ADD PRIMARY KEY (`id_jugador`),
                ADD KEY `club_id` (`club_id`);
              
              --
              -- Indices de la tabla `usuarios`
              --
              ALTER TABLE `usuarios`
                ADD PRIMARY KEY (`id_usuario`);
              
              --
              -- AUTO_INCREMENT de las tablas volcadas
              --
              
              --
              -- AUTO_INCREMENT de la tabla `clubes`
              --
              ALTER TABLE `clubes`
                MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
              
              --
              -- AUTO_INCREMENT de la tabla `jugadores`
              --
              ALTER TABLE `jugadores`
                MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
              
              --
              -- AUTO_INCREMENT de la tabla `usuarios`
              --
              ALTER TABLE `usuarios`
                MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
              
              --
              -- Restricciones para tablas volcadas
              --
              
              --
              -- Filtros para la tabla `jugadores`
              --
              ALTER TABLE `jugadores`
                ADD CONSTRAINT `club_id` FOREIGN KEY (`club_id`) REFERENCES `clubes` (`club_id`);
              COMMIT;
              
              END;
                $this->db->query($sql);
              <?php
        }
    }
}
?>