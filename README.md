# DB2-project

## Utilizando el framework Laravel, desarrollar el proyecto realizado en Base de Datos I, incorporarle el manejo de usuarios y roles según sea necesario, se deberá entregar con un instalador para poder ejecutar de forma fácil la configuración a BD, las migraciones y los seeders.

## Enunciado proyecto DB-1

#### Se desea realizar una base de datos para una cadena de farmacias distribuidas en diferentes ciudades. Cada farmacia tiene sus empleados propios, y cada empleado tiene su cargo: administrativo, farmacéutico, auxiliares de farmacia, pasantes, entre otros. En una farmacia pueden laborar varios farmacéuticos, dependiendo de la extensión del local.

#### Del farmacéutico se necesita conocer los datos del titulo (universidad, fecha, nro de registro en el registro principal), nro de permiso sanitario y nro de colegiatura. Por su parte, de los pasantes se necesita saber el nombre de la universidad o institución, especialidad, fecha de inicio y fecha de finalización de la pasantía, si es menor de edad se debe consignar el nro de permiso emitido por la autoridad del menor, asi como los datos de un representante. Los pasantes no reciben remuneración alguna. Se debe considerar que algunos pasantes una vez finalizan la pasantía quedan laborando de forma permanente.

#### Cada farmacia tiene a su vez un stock de medicamentos. Los medicamentos se organizan según la o las monodrogas que lo componen, su presentación (por ejemplo, ampollas de 5 unidades, jarabe de 100 ml, pomada 60 grs, etc), el laboratorio que lo comercializa, su acción terapéutica (analgésico, antibiótico, etc.) y la farmacia donde se encuentra. Por cada medicamento se mantiene su precio, nombre del principal componente que contiene, y la existencia del mismo en cada farmacia. Por ejemplo, la farmacia X puede tener 10 unidades del medicamento “Bisolvon en ampollas” y la farmacia Z puede tener 25 unidades del mismo medicamento.

#### Hay que tomar en cuenta que un mismo medicamento puede ser fabricado por diferentes laboratorios, especialmente este caso se presenta en los medicamentos genéricos. Por ejemplo, el medicamento “Ranitidina de 300 mgs” es fabricado por los laboratorios ELMOR y GENVEN.

#### Se necesita llevar la información referente a los laboratorios que fabrican los medicamentos, (dirección, teléfono entre otros), esto con la finalidad de hacer los pedidos correspondientes. Los pedidos también se le conocen como orden de compra y cada farmacia lo elabora de acuerdo a sus necesidades a cada laboratorio, y debe quedar reflejado el analista de compra que emitió el pedido. Una vez llegado el pedido se procede a emitir la compra, y la conforma solamente los productos que llegaron, esta compra siempre debe contener el número de pedido. En la orden de compra y la compra se deben incluir la forma de pago (contado, 5 d, 15d, 30d). Se debe tener un control de las cuentas por pagar de cada farmacia.

**Se debe entregar un informe que contenga:**

* Modelo E-R y el diagrama de clases
* Modelo Relacional en el DBMS de su preferencia
* Diccionario de datos (por cada tabla se debe mostrar nombre, la descripción, clavecprimaria, foráneas, descripción de cada campo y su tipo de datos)
* Pantallas de los formularios en el lenguaje de su preferencia
* Bajo integridad referencial se debe cargar las tablas con algunos para la creación de reportes basados en las siguientes consultas:
  * Listado de pasantes activos por farmacias (nombre y apellido, cedula, universidad, fecha de finalización de pasantía).
  * Mostrar el listado de cuentas por pagar pendientes, y totalizarlo, dado el nombre de una farmacia y la ciudad (el listado debe incluir nombre del laboratorio, fecha de vencimiento de la cuenta, y total de la cuenta)
  * Mostrar el listado de cuentas por pagar pendientes, y totalizarlo, dado por parametro el nombre de una farmacia (el listado debe incluir nombre del laboratorio, fecha de vencimiento de la cuenta, y total de la cuenta)
  * Mostrar el inventario de una farmacia dado como parámetros por el usuario el nombrede la misma asi como la acción terapéutica del medicamento (código del producto, descripción, laboratorio, cantidad del producto)
