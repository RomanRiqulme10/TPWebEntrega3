# TP ESPECIAL WEB 2 | TUDAI	:fa-laptop:

**Integrantes: **
- ALejo Rau
- Juan Pablo Sanzano Cernelli.
------------

**Temática del TPE: **Estadisticas de fútbol.

**Breve descripción de la temática:** Nuestra API propone mostrar las estadísticas de jugadores(Cumplen el rol de Item) que juegan en una variedad de clubes (Cumplen el rol de categoria) previamente subidos a la BD.

------------
### Verbos disponibles:

- **GET**
- **PUT**
- **POST**
- **DELETE**


------------
### Endpoints disponibles:

- #####  /jugadores
	GET /jugadores : Devuelve los jugadores existentes en la base de datos. Pueden devolverse de manera ascendente o descendente según goles, edad y club.

	GET /jugadores / ID: : Devuelve un jugador por el ID que uno decida, en caso de no existir se informará.

	POST /jugadores : Agrega un jugador a la base de datos. 

	PUT /jugadores/ ID: : Actualiza la información de un jugador en específico.

	 DELETE /jugadores/ ID: Elimina un jugador específico de la base de datos.


- ##### /clubes

	GET /clubes : Devuelve los clubes existentes en la base de datos.

	GET /clubes / ID: : Devuelve un club por el ID que uno decida, en caso de no existir se informará.

	POST /clubes : Agrega un club a la base de datos.

	PUT /clubes/ ID: : Actualiza la información de un jugador en específico.
