@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4">
{{--        game details --}}
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="cover" width="400"/>
            </div>
            <div class="lg:ml-12 xl:mr-64 xl:mt-0 lg:mt-0 md:mt-8 mt-8">
                <h2 class="font-semibold text-4xl text-white">{{ $game['name'] }}</h2>
                <div class="text-gray-400 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                    <span>
                        {{ $game['genres'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['involvedCompanies'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['platforms'] }}
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center mr-8 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-white text-xs flex justify-center items-center h-full">
                                {{ $game['memberRating'] }}
                            </div>
                        </div>
                        <div class="text-gray-400 ml-4 text-xs">Member <br/> Score</div>
                    </div>
                    <div class="flex items-center xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-white text-xs flex justify-center items-center h-full">
                                {{ $game['criticRating'] }}
                            </div>
                        </div>
                        <div class="text-gray-400 ml-4 text-xs">Critic <br/> Score</div>
                    </div>

                    <div class="flex items-center space-x-4 ml-6 md:ml-12 lg:ml-12 xl:ml-12 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        @if($game['social']['website'])
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="{{$game['social']['website']['url']}}" class="text-white hover:text-gray-400">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.2066 5.79348C12.0737 7.66252 12.0481 10.659 10.2179 12.4994C10.2145 12.5032 10.2104 12.5072 10.2066 12.511L8.10664 14.611C6.25445 16.4632 3.24105 16.4629 1.38914 14.611C-0.463047 12.7591 -0.463047 9.74536 1.38914 7.89348L2.5487 6.73392C2.8562 6.42642 3.38577 6.6308 3.40164 7.06536C3.42189 7.61917 3.5212 8.17558 3.70445 8.71289C3.76652 8.89483 3.72217 9.09608 3.58623 9.23202L3.17727 9.64098C2.30145 10.5168 2.27398 11.9429 3.14117 12.8272C4.01692 13.7203 5.45636 13.7256 6.33883 12.8432L8.43883 10.7435C9.3198 9.86251 9.31611 8.43858 8.43883 7.5613C8.32317 7.44586 8.20667 7.35617 8.11567 7.29352C8.05129 7.24931 7.99814 7.19067 7.96045 7.12227C7.92276 7.05387 7.90157 6.97762 7.89858 6.89958C7.8862 6.56936 8.0032 6.22908 8.26414 5.96814L8.92208 5.31017C9.09461 5.13764 9.36527 5.11645 9.56533 5.25608C9.79444 5.41606 10.009 5.59589 10.2066 5.79348V5.79348ZM14.6109 1.38905C12.759 -0.462891 9.74555 -0.463141 7.89336 1.38905L5.79336 3.48905C5.78961 3.4928 5.78555 3.49686 5.78211 3.50061C3.95192 5.34098 3.92627 8.33752 5.79336 10.2065C5.99095 10.4041 6.20554 10.5839 6.43464 10.7439C6.6347 10.8835 6.90539 10.8623 7.07789 10.6898L7.73583 10.0319C7.99677 9.77092 8.11376 9.43064 8.10139 9.10042C8.0984 9.02238 8.07721 8.94613 8.03952 8.87773C8.00183 8.80933 7.94867 8.75069 7.8843 8.70648C7.7933 8.64383 7.6768 8.55414 7.56114 8.4387C6.68386 7.56142 6.68017 6.13748 7.56114 5.25652L9.66114 3.15683C10.5436 2.27436 11.983 2.27967 12.8588 3.17277C13.726 4.05714 13.6985 5.4832 12.8227 6.35902L12.4137 6.76798C12.2778 6.90392 12.2335 7.10517 12.2955 7.28711C12.4788 7.82442 12.5781 8.38083 12.5983 8.93464C12.6142 9.3692 13.1438 9.57358 13.4513 9.26608L14.6108 8.10651C16.463 6.25467 16.463 3.24092 14.6109 1.38905V1.38905Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                        @endif
                        @if($game['social']['facebook'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{$game['social']['facebook']['url']}}" class="text-white hover:text-gray-400">
                                    <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.0075 8.9995L8.452 6.104H5.6735V4.225C5.6735 3.433 6.0615 2.6605 7.306 2.6605H8.569V0.1955C8.569 0.1955 7.423 0 6.327 0C4.039 0 2.5435 1.387 2.5435 3.8975V6.1045H0V9H2.5435V16H5.6735V9L8.0075 8.9995Z" fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                        @if($game['social']['twitter'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{$game['social']['twitter']['url']}}" class="text-white hover:text-gray-400">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.706 2.18952C21.871 2.55952 20.974 2.80952 20.031 2.92252C21.004 2.34031 21.7319 1.42398 22.079 0.344518C21.1648 0.887508 20.1643 1.26971 19.121 1.47452C18.4194 0.725384 17.4901 0.228845 16.4773 0.0619924C15.4646 -0.10486 14.4251 0.0673099 13.5202 0.551771C12.6154 1.03623 11.8958 1.80588 11.4732 2.74122C11.0505 3.67656 10.9485 4.72527 11.183 5.72452C9.33069 5.63151 7.51863 5.15007 5.86442 4.31142C4.21022 3.47278 2.75084 2.29568 1.581 0.856519C1.181 1.54652 0.951 2.34652 0.951 3.19852C0.950554 3.96551 1.13943 4.72076 1.50088 5.39725C1.86232 6.07374 2.38516 6.65056 3.023 7.07652C2.28328 7.05298 1.55987 6.8531 0.913 6.49352V6.55352C0.912925 7.62926 1.28503 8.6719 1.96618 9.50451C2.64733 10.3371 3.59557 10.9084 4.65 11.1215C3.96378 11.3072 3.24434 11.3346 2.546 11.2015C2.8435 12.1271 3.423 12.9365 4.20337 13.5164C4.98374 14.0963 5.92592 14.4177 6.898 14.4355C5.24783 15.7309 3.20989 16.4336 1.112 16.4305C0.740381 16.4306 0.369076 16.4089 0 16.3655C2.12948 17.7347 4.60834 18.4613 7.14 18.4585C15.71 18.4585 20.395 11.3605 20.395 5.20452C20.395 5.00452 20.39 4.80252 20.381 4.60252C21.2923 3.94349 22.0789 3.12741 22.704 2.19252L22.706 2.18952V2.18952Z" fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                        @if($game['social']['instagram'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{$game['social']['instagram']['url']}}" class="text-white hover:text-gray-400">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.465 0.066C7.638 0.012 8.012 0 11 0C13.988 0 14.362 0.013 15.534 0.066C16.706 0.119 17.506 0.306 18.206 0.577C18.939 0.854 19.604 1.287 20.154 1.847C20.714 2.396 21.146 3.06 21.422 3.794C21.694 4.494 21.88 5.294 21.934 6.464C21.988 7.639 22 8.013 22 11C22 13.988 21.987 14.362 21.934 15.535C21.881 16.705 21.694 17.505 21.422 18.205C21.146 18.9391 20.7133 19.6042 20.154 20.154C19.604 20.714 18.939 21.146 18.206 21.422C17.506 21.694 16.706 21.88 15.536 21.934C14.362 21.988 13.988 22 11 22C8.012 22 7.638 21.987 6.465 21.934C5.295 21.881 4.495 21.694 3.795 21.422C3.06092 21.146 2.39582 20.7133 1.846 20.154C1.28638 19.6047 0.853315 18.9399 0.577 18.206C0.306 17.506 0.12 16.706 0.066 15.536C0.012 14.361 0 13.987 0 11C0 8.012 0.013 7.638 0.066 6.466C0.119 5.294 0.306 4.494 0.577 3.794C0.853723 3.06008 1.28712 2.39531 1.847 1.846C2.39604 1.2865 3.06047 0.853443 3.794 0.577C4.494 0.306 5.294 0.12 6.464 0.066H6.465ZM15.445 2.046C14.285 1.993 13.937 1.982 11 1.982C8.063 1.982 7.715 1.993 6.555 2.046C5.482 2.095 4.9 2.274 4.512 2.425C3.999 2.625 3.632 2.862 3.247 3.247C2.88205 3.60205 2.60118 4.03428 2.425 4.512C2.274 4.9 2.095 5.482 2.046 6.555C1.993 7.715 1.982 8.063 1.982 11C1.982 13.937 1.993 14.285 2.046 15.445C2.095 16.518 2.274 17.1 2.425 17.488C2.601 17.965 2.882 18.398 3.247 18.753C3.602 19.118 4.035 19.399 4.512 19.575C4.9 19.726 5.482 19.905 6.555 19.954C7.715 20.007 8.062 20.018 11 20.018C13.938 20.018 14.285 20.007 15.445 19.954C16.518 19.905 17.1 19.726 17.488 19.575C18.001 19.375 18.368 19.138 18.753 18.753C19.118 18.398 19.399 17.965 19.575 17.488C19.726 17.1 19.905 16.518 19.954 15.445C20.007 14.285 20.018 13.937 20.018 11C20.018 8.063 20.007 7.715 19.954 6.555C19.905 5.482 19.726 4.9 19.575 4.512C19.375 3.999 19.138 3.632 18.753 3.247C18.3979 2.88207 17.9657 2.60121 17.488 2.425C17.1 2.274 16.518 2.095 15.445 2.046V2.046ZM9.595 14.391C10.3797 14.7176 11.2534 14.7617 12.0669 14.5157C12.8805 14.2697 13.5834 13.7489 14.0556 13.0422C14.5278 12.3356 14.7401 11.4869 14.656 10.6411C14.572 9.79534 14.197 9.00497 13.595 8.405C13.2112 8.02148 12.7472 7.72781 12.2363 7.54515C11.7255 7.36248 11.1804 7.29536 10.6405 7.34862C10.1006 7.40187 9.57915 7.57418 9.1138 7.85313C8.64846 8.13208 8.25074 8.51074 7.9493 8.96185C7.64786 9.41296 7.45019 9.92529 7.37052 10.462C7.29084 10.9986 7.33115 11.5463 7.48854 12.0655C7.64593 12.5847 7.91648 13.0626 8.28072 13.4647C8.64496 13.8668 9.09382 14.1832 9.595 14.391ZM7.002 7.002C7.52702 6.47698 8.15032 6.0605 8.8363 5.77636C9.52228 5.49222 10.2575 5.34597 11 5.34597C11.7425 5.34597 12.4777 5.49222 13.1637 5.77636C13.8497 6.0605 14.473 6.47698 14.998 7.002C15.523 7.52702 15.9395 8.15032 16.2236 8.8363C16.5078 9.52228 16.654 10.2575 16.654 11C16.654 11.7425 16.5078 12.4777 16.2236 13.1637C15.9395 13.8497 15.523 14.473 14.998 14.998C13.9377 16.0583 12.4995 16.654 11 16.654C9.50046 16.654 8.06234 16.0583 7.002 14.998C5.94166 13.9377 5.34597 12.4995 5.34597 11C5.34597 9.50046 5.94166 8.06234 7.002 7.002V7.002ZM17.908 6.188C18.0381 6.06527 18.1423 5.91768 18.2143 5.75397C18.2863 5.59027 18.3248 5.41377 18.3274 5.23493C18.33 5.05609 18.2967 4.87855 18.2295 4.71281C18.1622 4.54707 18.0624 4.39651 17.936 4.27004C17.8095 4.14357 17.6589 4.04376 17.4932 3.97652C17.3275 3.90928 17.1499 3.87598 16.9711 3.87858C16.7922 3.88119 16.6157 3.91965 16.452 3.9917C16.2883 4.06374 16.1407 4.1679 16.018 4.298C15.7793 4.55103 15.6486 4.88712 15.6537 5.23493C15.6588 5.58274 15.7992 5.91488 16.0452 6.16084C16.2911 6.40681 16.6233 6.54723 16.9711 6.5523C17.3189 6.55737 17.655 6.42669 17.908 6.188V6.188Z" fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <p class="mt-12 text-gray-400">
                    {{ $game['summary'] }}
                </p>
                <div class="mt-12">
                    <a href="{{ $game['trailer'] }}" class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg class="w-6 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45">
                            <path d="M22.5 0C10.08 0 0 10.08 0 22.5S10.08 45 22.5 45 45 34.92 45 22.5 34.92 0 22.5 0zm0 40.5c-9.9225 0-18-8.0775-18-18s8.0775-18 18-18 18 8.0775 18 18-8.0775 18-18 18zm-5.625-7.875L32.625 22.5l-15.75-10.125v20.25z" fill="#000"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div>
{{--        end game details--}}
{{--        images container--}}
        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ $screenshot['huge'] }}">
                        <img src="{{ $screenshot['big'] }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
{{--        end images container--}}
{{--        similar games--}}
        <div class="similar-games-container mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Similar Games</h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similarGames'] as $game)
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @if($game['rating'])
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px">
                            <div class="text-white font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['rating'] }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <a href="#" class="text-white block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
                    <div class="text-gray-400 mt-1">
                        @if(array_key_exists('abbreviation', $platform))
                            @foreach($game['platforms'] as $platform)
                                @if (array_key_exists('abbreviation', $platform))
                                    {{ $platform['abbreviation'] }}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            </div> <!-- end similar-games -->
        </div> <!-- end similar-games-container -->
    </div>
@endsection
