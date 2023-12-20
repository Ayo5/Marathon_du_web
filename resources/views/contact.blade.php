@extends("templates.app")

@section('content')
    <div class="contact-form">
        <h2>Contactez-nous</h2>
        <form action="#" method="post">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
@endsection