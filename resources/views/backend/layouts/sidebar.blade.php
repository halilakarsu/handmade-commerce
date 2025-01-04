<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    <div class="page-sidebar">
        <div class="sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <div><img class="img-60 rounded-circle lazyloaded blur-up" src="/backend/images/users/{{Auth::user()->user_file}}" alt="#">
                </div>
                <h6 style="text-transform:none" class="mt-3 f-14">{{Auth::user()->name}}</h6>
                <p style="text-transform:capitalize;">{{Auth::user()->usertype}}</p>
            </div>
            <ul class="sidebar-menu">
                <li><a class="sidebar-header" href="{{route('backend.home')}}"><i data-feather="home"></i><span>Anasayfa</span></a></li>
                <li><a class="sidebar-header" href="javascript:void(0)">
                        <i data-feather="box"></i> <span>Ürün İşlemleri</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('products.index')}}"><i class="fa fa-circle"></i>
                                <span>Ürünler</span> <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-circle"></i>
                                <span>Kategori</span> <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{route('categories.create')}}"><i class="fa fa-circle"></i>Kategoriler</a></li>
                                <li><a href="{{route('types.index')}}"><i class="fa fa-circle"></i>Alt Kategoriler</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Satış</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="order.html"><i class="fa fa-circle"></i>Siparişler</a></li>
                        <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sliderler</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('sliders.index')}}"><i class="fa fa-circle"></i>Slider</a></li>
                        <li><a href="{{route('banners.index')}}"><i class="fa fa-circle"></i>Banner</a></li>
                    </ul>
                </li>


                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Kullanıcılar</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('users.index')}}"><i class="fa fa-circle"></i>Kullancı Listesi</a></li>
                        <li><a href="{{route('users.create')}}"><i class="fa fa-circle"></i>Kullanıcı Oluştur</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="chrome"></i><span>Kargo İşlemleri</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="translations.html"><i class="fa fa-circle"></i>Translations</a></li>
                        <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates</a></li>
                        <li><a href="taxes.html"><i class="fa fa-circle"></i>Taxes</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>Raporlar</span></a></li>

                <li><a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>Faturalar</span></a>
                </li>
                <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Ayarlar</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('settings.index')}}"><i class="fa fa-circle"></i>Genel Ayarlar</a></li>
                        <li><a href="profile.html"><i class="fa fa-circle"></i>Profil</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href="{{route('backend.logout')}}"><i data-feather="log-out"></i><span>Çıkış</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Page Sidebar Ends-->

    <!-- Right sidebar Start-->
    <div class="right-sidebar custom-scrollbar" id="right_side_bar">
        <div>
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-end p-0"><i class="me-2" data-feather="settings"></i></div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30">
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user.png" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user1.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status"> 28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user2.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/man.png" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/designer.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/man.png" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/man.png" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="/backend/assets/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Right sidebar Ends-->
