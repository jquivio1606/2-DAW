
# PokéConsulta

## Introducción
Este proyecto tiene como objetivo la creación de una aplicación web que consulta información sobre Pokémon a través de la API de PokéAPI. Permite obtener información detallada de un Pokémon por su ID o mostrar una lista de 20 Pokémon.

## Requisitos
- Navegador web moderno (Chrome, Firefox, Edge).
- Conexión a Internet para acceder a la API de PokéAPI.

## Instrucciones para ejecutar la aplicación
1. **Descargar los archivos**: Asegúrate de tener los siguientes archivos en el mismo directorio:
   - `index.html`
   - `estilos.css` (opcional, para personalizar el estilo)
   - `script.js` (el código JavaScript que manejará las peticiones a la API)

2. **Abrir el archivo HTML**: Puedes abrir `index.html` en cualquier navegador como Chrome.

3. **Buscar un Pokémon por ID**: Ingresa un número de ID en el campo de entrada y haz clic en "Buscar" para obtener información sobre el Pokémon.

4. **Borrar Pokémon**: Si se pulsa el botón "Borrar", se limpia la información que se muestra del Pokémon en específico.

5. **Mostrar todos los Pokémon**: Haz clic en "Mostrar 20 Pokémon" para ver una lista de los primeros 20 Pokémon.

6. **Ocultar la tabla**: Haz clic en "Ocultar Tabla" para limpiar la vista de la tabla.

## Funcionalidades
1. **Consulta por ID**: Introduce el ID de un Pokémon para obtener su información.
2. **Mostrar 20 Pokémon**: Muestra una lista con los primeros 20 Pokémon.
3. **Borrar Pokémon**: Elimina la información de Pokémon mostrada.
4. **Ocultar tabla**: Oculta la tabla de Pokémon.

## Capturas de pantalla
### Consulta de Pokémon por ID
![Captura de pantalla de la consulta por ID](captura_id.png)
*La imagen muestra cómo se visualiza la información de un Pokémon cuando se ingresa un ID válido.*

## Posibles problemas y errores
- **Problema de conexión a la API**: Si la API de Pokémon está caída o hay problemas con la conexión a Internet, los botones de búsqueda pueden mostrar un mensaje de error.
  
- **ID no válido**: Si se ingresa un ID no válido o inexistente, el sistema mostrará un mensaje de "Pokémon no encontrado".

- **Errores al cargar la lista de Pokémon**: Si no se pueden cargar los 20 Pokémon desde la API, la tabla mostrará un mensaje de error.

- **Problemas de visualización en móviles**: Aunque se ha ajustado el estilo de la web dependiendo de la resolución, puede que la tabla o los botones no se ajusten correctamente en pantallas más pequeñas.

## Conclusión
La aplicación cumple con su propósito de mostrar información de Pokémon de manera rápida y eficiente. Se pueden realizar mejoras en la adaptación a dispositivos móviles.

## Bibliografía
- [PokéAPI](https://pokeapi.co/)

