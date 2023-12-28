# Prueba Técnica
### Ingeniero de Software

![PHP Version](https://img.shields.io/packagist/dependency-v/laravel/laravel/PHP)
![Estado del Proyecto](https://img.shields.io/badge/STATUS-FINALIZADO-%20)

## Descripción
Prueba técnica para el rol de Ingeniera de Software, estos son los 3 ejercicios relevantes: funcionamiento del foreach, un diagrama de clases y un N-grama utilizando POO - Programación Orientada a Objetos.

## Bucle foreach

Realice de manera escrita y lógica un bucle foreach para mostrar en pantalla 50 números pares.

## Diagrama de Clases

En una clínica odontológica, el paciente solicita la cita por teléfono o en la sede de la clínica. Un día antes de la cita, un funcionario de servicio al cliente llama al paciente para confirmarla. Si es confirmada, se informa al área de instrumental para que tengan listo los materiales que se van a requerir al siguiente día. Si es cancelada, se agenda una nueva cita. Si la persona no quiere agendar nueva cita, se deja el caso pendiente para hacerle seguimiento cada semana, hasta que ya se decida desistir del paciente.

Cuando llega el paciente, un funcionario de servicio al cliente registra su llegada y revisa si debe pasar por caja para pagar algo. Si es así, el paciente pasa primero por caja, realiza el pago de lo que corresponda y luego espera a que sea llamado por el doctor que lo va a atender. Al entrar al consultorio, el doctor crea su historia clínica si es por primera vez, si no, confirma los datos (anamnésis) y luego hace una pequeña entrevista al paciente para conocer el motivo de la cita. Luego ejecuta el trabajo a realizar (cirugía, endodoncia, limpieza, implante, control, etc) y registra el resultado del trabajo. Finalmente da las recomendaciones finales al paciente e imprime remisiones y fórmulas médicas si son necesarias. Si se desea agendar nueva cita, también se puede hacer.

Al salir, el paciente puede requerir hacer un pago, en cuyo caso debe pasar por caja a cancelar el valor adeudado o hacer un anticipo.

> **Diseñe un diagrama de clases que modele el caso de negocio planteado. Es sólo un diseño conceptual, NO es necesario pensar en atributos y métodos de cada clase.**

## Trigrama
Un trigrama es un N-grama con n = 3. Lo que esto significa es que al analizar un conjunto de datos, las subsecuencias relacionadas serán de 3 elementos, de tal manera que los primeros dos implican el tercer elemento. Por ejemplo, podemos generar trigramas sobre un párrafo o libro completo, buscando secuencias de dos palabras seguidas por una tercera.

Para generar nuevo texto a partir del análisis realizado, escogemos un par de palabras arbitrario. Buscamos el par de palabras en los trigramas para obtener la siguiente palabra. Luego cogemos las últimas 2 palabras del nuevo texto y las buscamos en los trigramas para obtener la siguiente palabra y así sucesivamente hasta que no encontremos un par de palabras en las llaves.

> **Desarrolle un programa que lea un archivo de texto, genere los trigramas a partir de ese texto y que luego, dadas 2 palabras, genere un nuevo texto siguiendo el procedimiento descrito.**
