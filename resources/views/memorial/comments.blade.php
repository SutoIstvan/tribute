@extends('layouts.edit')

@section('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <style>
        :before,
        :after {
            margin: 0;
            padding: 0;
            word-break: break-all;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        .holder {
            background-image: url('../../circle.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        .holder {
            margin: 0rem auto 0;
            width: 150px;
            height: 400px;
            position: relative;
        }

        .holder *,
        .holder *:before,
        .holder *:after {
            position: absolute;
            content: "";
        }

        .candle {
            bottom: 243px;
            width: 150px;
            /* background-image: url('circle.png'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .flame {
            width: 18px;
            height: 80px;
            left: 50%;
            transform-origin: 50% 100%;
            transform: translateX(-50%);
            bottom: 100%;
            border-radius: 50% 50% 20% 20%;
            background: rgba(255, 255, 255, 1);
            background: linear-gradient(white 80%, transparent);
            animation: moveFlame 6s linear infinite, enlargeFlame 5s linear infinite;
        }

        .flame:before {
            left: 1%;
            width: 100%;
            height: 100%;
            border-radius: 50% 50% 20% 20%;
            box-shadow: 0 0 15px 0 rgba(132, 66, 25, 0.4), 0 -6px 4px 0 rgba(247, 128, 0, .7);
        }

        @keyframes moveFlame {

            0%,
            100% {
                transform: translateX(-50%) rotate(-2deg);
            }

            50% {
                transform: translateX(-50%) rotate(2deg);
            }
        }

        @keyframes enlargeFlame {

            0%,
            100% {
                height: 80px;
            }

            50% {
                height: 100px;
            }
        }

        .glow {
            width: 22px;
            height: 60px;
            border-radius: 50% 50% 35% 35%;
            left: 50%;
            top: -48px;
            transform: translateX(-50%);
            background: rgba(0, 132, 255, 0.207);
            box-shadow: 0 -40px 30px 0 #dc8a0c, 0 40px 50px 0 #dc8a0c, inset 3px 0 2px 0 rgba(0, 133, 255, .6), inset -3px 0 2px 0 rgba(0, 133, 255, .6);
        }

        .glow:before {
            width: 70%;
            height: 60%;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            border-radius: 50%;
            background: rgba(199, 11, 11, 0.35);
        }

        .blinking-glow {
            width: 100px;
            height: 180px;
            left: 50%;
            top: -55%;
            transform: translate(-50%, -70%);

            border-radius: 50%;
            background: #ff62008b;
            filter: blur(60px);
            animation: blinkIt .1s infinite;
        }

        @keyframes blinkIt {
            50% {
                opacity: .8;
            }
        }



        .dropzone .dz-preview.dz-image-preview {
            background: #212529 !important;
        }

        .dropzone .dz-preview .dz-remove {
            margin-top: 10px;
        }


        .drag-area {
            position: relative;
            height: 290px;
            border: 1.4px dashed #6c757d;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 1px auto;
        }

        .drag-area .icon {
            font-size: 50px;
            color: #fefefe;
        }

        .drag-area .header {
            font-size: 18px;
            font-weight: 500;
            color: #a4a4a4;
        }

        .drag-area .support {
            font-size: 12px;
            color: gray;
            margin: 10px 0 15px 0;
        }

        .drag-area .button {
            font-size: 16px;
            font-weight: 500;
            color: #fafafa;
            cursor: pointer;
            background-color: #5b5e60;
        }

        .drag-area.active {
            border: 1px solid #787878;
        }

        .drag-area img {
            width: 100%;
            height: 100%;
            border-radius: 4px;
            object-fit: cover;
        }

        .deleteBtn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 0, 0, 0.7);
            /* Полупрозрачный красный фон */
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .item .img {
            border-radius: 15px;
            height: 255px;
            overflow: hidden;
        }

        .fit-img img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center center;
            object-position: center center;
        }

        img {
            width: 100%;
            height: auto;
        }


        .search-container {
            position: relative;
        }

        .search-input {

            padding-left: 44px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            font-size: 16px;

        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #888;
        }
    </style>
@endsection

@section('title', 'Hozzászólások - mbook.hu')

@section('content')
<div class="container mx-auto px-4 py-8 section-padding">
    <div class="d-flex justify-content-between align-items-center mb-6">
        <h1 class="text-2xl font-bold text-light">Hozzászólások: {{ $memorial->name }}</h1>
        {{-- <a href="{{ route('memorial.index') }}" class="btn btn-secondary">
            Назад
        </a> --}}
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="bg-dark rounded-lg shadow overflow-hidden">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 largecase tracking-wider">Dátum</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 largecase tracking-wider">Név</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 largecase tracking-wider">Megjegyzés</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 largecase tracking-wider">Állapot</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 largecase tracking-wider">Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light">
                            {{ $comment->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-light">
                            {{ $comment->name }}
                        </td>
                        <td class="px-6 py-4 text-light">
                            {{ $comment->content }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($comment->status === 'pending')
                                <span class="badge bg-warning text-dark">Moderálás alatt</span>
                            @elseif($comment->status === 'approved')
                                <span class="badge bg-success">Jóváhagyva</span>
                            @else
                                <span class="badge bg-danger">Elutasítva</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="d-flex gap-2">
                                @if($comment->status === 'pending')
                                    <form action="{{ route('comments.approve', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success">
                                            Jóváhagyni
                                        </button>
                                    </form>
                                    {{-- <form action="{{ route('comments.reject', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Отклонить
                                        </button>
                                    </form> --}}
                                @endif
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Вы уверены?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                        Töröl
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                            Még nincsenek hozzászólások
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4">
            {{ $comments->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@section('js')
   

@endsection
