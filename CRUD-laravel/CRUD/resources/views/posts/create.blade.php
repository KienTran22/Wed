<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Post</title>
    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3 class="mb-4">Add a Post</h3>
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="title" 
                            name="title" 
                            placeholder="Enter the title" 
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea 
                            class="form-control" 
                            id="content" 
                            name="content" 
                            rows="3" 
                            placeholder="Enter the content" 
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-w76A2Jn7Kv/VWIYvBrFpDUsIaSnCdT90sN8mcqH5StRnPpLVn68fqmjR/ZV+EkH+" 
        crossorigin="anonymous">
    </script>
</body>
</html>
