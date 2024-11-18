
    @extends('layouts.master')

    @section('title')
    404 Error
    @endsection

    @section('content')
    <!-- Start Error Area -->
    <div class="error-area">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
            <div class="error-content">
                <h1>404</h1>
                <h2>Oops! Page Not Found!</h2>
                <p>The page you are looking for does not exist. It might have been moved or deleted.</p>
                <div class="button">
                <a href="index.html" class="btn">Back to Home</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End Error Area -->
    @endsection

    @push('js')
    <script>
        window.onload = function () {
        window.setTimeout(fadeout, 500);
        }

        function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
        }
    </script>
    @endpush

