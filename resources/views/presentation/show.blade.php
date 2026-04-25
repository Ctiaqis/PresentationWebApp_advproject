<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tutorial->judul }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">

    <script>
        setInterval(function () {
            location.reload();
        }, 5000);
    </script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="mb-2">{{ $tutorial->judul }}</h1>

                <p class="text-muted mb-0">
                    {{ $tutorial->kode_matkul }} - {{ $tutorial->nama_matkul }}
                </p>
            </div>
        </div>

        @forelse($details as $detail)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    Langkah {{ $detail->order_number }}
                </div>

                <div class="card-body">
                    @if($detail->text)
                        <p>{{ $detail->text }}</p>
                    @endif

                    @if($detail->gambar)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $detail->gambar) }}"
                                 class="img-fluid rounded"
                                 alt="Gambar tutorial">
                        </div>
                    @endif

                    @if($detail->code)
                        <pre><code>{{ $detail->code }}</code></pre>
                    @endif

                    @if($detail->url)
                        <p>
                            <a href="{{ $detail->url }}" target="_blank">
                                {{ $detail->url }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Belum ada detail tutorial yang ditampilkan.
            </div>
        @endforelse
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>
</html>