@if ($paginator->hasPages())
        <ul class="pagination">
            @if ($paginator->onFirstPage())

            @else
                <li>
                    <a class="pagination__link" href="{{ \Request::url() }}"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                </li>
                <li>
                    <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                </li>
            @endif

            @php

                if (!isset($_GET['page'])) {
                              $page = 1;
                            }else{
                              $page = $_GET['page'];
                        }

                        $number_of_pages = $query->total();

                    // Middle

                    if ($number_of_pages < 6) {

                        foreach ($elements as $element){

                        foreach ($element as $page => $url) {
                            if ($page == $paginator->currentPage()){
                                echo '<li><a class="pagination__link pagination__link--active" href="javascript:void(0)">'.$page.'</a></li>';
                            }else{
                                echo '<li><a class="pagination__link" href="'.$url.'">'.$page.'</a></li>';
                            }

                        }
                        }

                    }else{

                        if ($page != 1 && $page != 2 && $page != $number_of_pages-1 && $page != $number_of_pages) {
                            for ($i=$page-2; $i <=$page+2 ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="pagination__link pagination__link--active" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{
                                    if (isset($elements[0][$i])){
                                         echo '<li><a class="pagination__link" href="'.$elements[0][$i].'">'.$i.'</a></li>';
                                    }
                                }

                            }
                        }else if ($page == 1 || $page == 2) {
                            for ($i=1; $i <=5 ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="pagination__link pagination__link--active" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{

if (isset($elements[0][$i])){
                                         echo '<li><a class="pagination__link" href="'.$elements[0][$i].'">'.$i.'</a></li>';
                                    }                                }

                            }
                        }else if ($page == $number_of_pages-1 || $page == $number_of_pages) {
                            for ($i=$number_of_pages-4; $i <=$number_of_pages ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="pagination__link pagination__link--active" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{

if (isset($elements[0][$i])){
                                         echo '<li><a class="pagination__link" href="'.$elements[0][$i].'">'.$i.'</a></li>';
                                    }                                }

                            }
                        }

                    }


    // /Middle

            @endphp

            @if ($paginator->hasMorePages())
                    <li>
                        <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                    </li>
                    <li>
                        <a class="pagination__link" href="{{ \Request::url().'?page='.$paginator->lastPage() }}"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                    </li>
            @else

            @endif
        </ul>
 @endif

