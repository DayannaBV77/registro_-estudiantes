<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Estudiantes</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #334155;
        }

        header {
            background: #1e3a8a;
            color: white;
            padding: 22px 8%;
        }

        .contenedor {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .bienvenida {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            padding: 35px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .tarjeta {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
            margin-bottom: 25px;
        }

        h2 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .campo {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: 2px solid #93c5fd;
            border-color: #2563eb;
        }

        button {
            background: #2563eb;
            color: white;
            padding: 13px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #1e40af;
        }

        .mensaje {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .errores {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .tabla-contenedor {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #eff6ff;
            color: #1e3a8a;
        }

        footer {
            background: #1e3a8a;
            color: white;
            padding: 25px;
            text-align: center;
        }

    </style>

</head>

<body>

    <header>
        <h2 style="color:white; margin:0;">
            SISTEMA DE ESTUDIANTES
        </h2>
    </header>

    <main class="contenedor">

        <section class="bienvenida">
            <h1>¡Bienvenido al sistema!</h1>
            <p>Registra y administra tus estudiantes.</p>
        </section>

        <section class="tarjeta">

            <h2>Registrar nuevo estudiante</h2>

            @if(session('success'))
                <div class="mensaje">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="errores">
                    <strong>Revisa los siguientes errores:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/estudiantes') }}" method="POST">

                @csrf

                <div class="campo">
                    <label>Nombre completo</label>

                    <input
                        type="text"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Escribe el nombre"
                        required
                    >
                </div>

                <div class="campo">
                    <label>Edad</label>

                    <input
                        type="number"
                        name="edad"
                        value="{{ old('edad') }}"
                        placeholder="Escribe la edad"
                        min="1"
                        max="120"
                        required
                    >
                </div>

                <div class="campo">
                    <label>Correo electrónico</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="correo@ejemplo.com"
                        required
                    >
                </div>

                <div class="campo">
                    <label>Curso</label>

                    <input
                        type="text"
                        name="curso"
                        value="{{ old('curso') }}"
                        placeholder="Ejemplo: Desarrollo Web"
                        required
                    >
                </div>

                <button type="submit">
                    Registrar estudiante
                </button>

            </form>

        </section>

        <section class="tarjeta">

            <h2>Estudiantes registrados</h2>

            <div class="tabla-contenedor">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Curso</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($estudiantes as $estudiante)

                            <tr>
                                <td>{{ $estudiante->id }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->edad }}</td>
                                <td>{{ $estudiante->email }}</td>
                                <td>{{ $estudiante->curso }}</td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5">
                                    Todavía no hay estudiantes registrados.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

    <footer>
        Sistema de Estudiantes © 2026 - Laravel 12
    </footer>

</body>
</html>

