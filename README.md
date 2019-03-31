# Test for PlaceToPay
En el siguiente repositorio se encuentra la resolución de la prueba planteada por ustedes.

Fue realizada por parte de Naudys Reina, con el objeto de optar al cargo de desarrollador.

Fue realizada el 30/03/19.

Contiene dos ramas, la master contiene el paso 1 del proyecto desarrollado.

La estructura de código fue desarrollada de acuerdo a los estándares PSR-1, PSR-2 y PSR-4.

# Funcionamiento de la aplicación

De acuerdo a las especificaciones dadas por ustedes, se desarrolló la aplicación de la siguiente manera:

- Se tiene un formulario que recolecta los datos que son recomendados y necesarios de la api de ustedes, tales como:
    - Nombre
    - Correo electrónico
    - Referencia
    - Descripción
    - Monto
    - Moneda

- Una vez ingresados los mismos, se ejecuta la función sendRequest del controlador RequestToPay, que se encarga de recolectar los datos ingresados y los datos de autenticación, acto seguido se realiza una petición a la api, la cual retorna la respuesta satisfactoria, con el requestId y el processUrl.

- Se redirecciona al sitio de PlacetoPay usando la dirección processUrl, donde se ingresan los datos de pago correspondientes. Una vez realizado este proceso el sistema genera una respuesta del pago y permite volver al sitio.

- El sistema devuelve la respuesta y es capturada en la función receiveRequest del controlador
ResponseToPay, esta respuesta es almacenada en base de datos y en cache; en base de datos para obtener el histórico y en cache para mantener el registro de la última transacción realizada, y que sea visible para el usuario por un lapso de 60 minutos en la página principal.

# Estructura

El proyecto consta de dos controladores, llamados RequestToPay y ResponseToPay, uno está encargado de procesar la solicitud, y el otro la respuesta respectivamente. Estos controladores se encuentran ubicados en la ruta app\Http\Controllers\Request y app\Http\Controllers\Response respectivamente.

Consta de un modelo llamado Responses, el cual permite alojar las respuestas de la api en la base de datos. Este modelo se encuentra ubicado en la ruta app\Http\Models.

La libreria de Dnetix fue usada para simplificar el proceso de conexión y consumo de la api. Esta librería está ubicada en la ruta app\Libraries.

# Pruebas

Se realizaron pruebas unitarias para verificar la carga de las diferentes vistas y métodos del proyecto.

Para ejecutar las pruebas se debe ejecutar el comando vendor/bin/phpunit

Las pruebas realizadas fueron:
- Verificar que el home carga correctamente.
- Verificar que se envíe un formulario con datos al método sendRequest correctamente.
- Verificar que el método responseRequest cargue correctamente.

# Paso 2

Con respecto a realizar y usar un patron de diseño que permitar dar con una solución al problema desarrollado en el Paso 1, una sugerencia para ello es un patron estilo Composite, que permita reunir objetos sencillos en un objeto más complejo.

En este caso, tenemos tres clases sencillas llamadas Auth, Client y Payment, cada una por separado tiene su información propia, son independientes, y pueden existir sin la intervención de las otras. Pero en conjunto pueden formar una más compleja, que permite cumplir con el requerimiento de funcionalidad del proyecto.

Además existen los métodos llamados getAuth, getClient y getPayment. Todos ellos retornan información de sus respectivas clases. En la clase compleja se pudiera crear este método que sería implementado en las clases hijas.

Con la jerarquización se permite reutilizar código y se tendría una estructura de arbol, la cual es eficiente en búsquedas.

Por lo tanto, dado mi análisis al respecto, puedo afirmar que un patron similar al Composite, puede ser útil en este proyecto.

