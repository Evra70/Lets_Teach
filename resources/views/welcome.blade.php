@extends('master.home_master')

@section('web-title','Home')

@section('content')
<!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="/asset/img/banner/edu_ilastration.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>Belajar Nyaman<br>
                                Belajar Senang</h3>
                            <a href="#test-form" class="boxed_btn login popup-with-form">Ayo! Mulai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Let's Teach
                        <p>kesenjangan perekonomian dan sosial di Indonesia sangat tinggi terjadi
                        untuk itu kami buat aplikasi yang  bertujuan untuk mengurangi beban pengangguran.<br>
                        Lets teach adalah salah satu aplikasi yang dapat mengurangi<br> 
                        angka kesenjangan perekonomian dan sosial di Indonesia, dimana<br>
                        di aplikasi ini memberikan kesempatan besar bagi para lulusan <br>
                        sarjana maupun guru-guru yang belum memiliki job kerja untuk <br>
                        dapat menyalurkan ilmu (mengajar) kepada para murid yang membutuhkan
                        bimbingan dalam belajar</p>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>5,28%</span>
                                    <p>Pengangguran di Tahun 2019</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>29,8%</span>
                                    <p>Kualitas pendidikan rendah</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>16,3 %</span>
                                    <p> interaksi sosial siswa dari 92 siswa pada kategori rendah yaitu 15 siswa</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- testimonial_area_start -->
    <div class="testimonial_area testimonial_bg_1 overlay">
        <div class="testmonial_active owl-carousel">
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="/asset/img/testmonial/g1.jpg" alt="">
                                </div>
                                <p>
                                "Kemajuan kita sebagai bangsa tidak bisa lebih cepat <br>
                                    dari pada kemajuan kita dalam pendidikan.
                                    Pikiran manusia adalah sumber daya fundamental kita."

                                </p>
                                <span>John F. Kennedy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="/asset/img/testmonial/g2.jpg" alt="">
                                </div>
                                <p>
                                    " Terbentur, Terbentur, Terbentuk "
                                </p>
                                <span>Tan Malaka</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="/asset/img/testmonial/g3.jpg" alt="">
                                </div>
                                <p>
                                   "Sistem pendidikan yang bijaksana setidaknya akan mengajarkan kita<br> betapa sedikitnya yang belum diketahui oleh manusia, seberapa banyak<br> yang masih harus ia pelajari." 
                                </p>
                                <span>Sir John Lubbock</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_area_end -->

    <!-- our_courses_start -->
    <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>VISI</h3>
                        <p>Sebagai Saluran Belajar Dan Interaksi Antara Guru <br>
                        Dengan Murid Yang Aman, Nyaman, Dan Senang.</p>
                        </p>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/tt.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Aman Dalam Belajar</h3>
                            </div>
                            <p class="blog_text">
                               Aman terhadap resiko tindak kejahatan 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/nyaman.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Nyaman</h3>
                            </div>
                            <p class="blog_text">
                                Menciptakan kenyamanan dalam proses belajar.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/senang.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Senang</h3>
                            </div>
                            <p class="blog_text">
                                Pemberian materi yang menyenangkan <br>
                                tanpa membosankan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_courses_end -->

    <!-- our_latest_blog_start -->
    <div class="our_latest_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>MISI</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/gur.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Mengurangi Angka Pengangguran</h3>
                            </div>
                            <p class="blog_text">
                                Terutama bagi para lulusan sarjana <br>
                                maupun guru yang belum memiliki job kerja.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/Capture.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Meningkatkan Mutu Pendidikan</h3>
                            </div>
                            <p class="blog_text">
                                 Dimulai dari kualitas guru, peningkatan materi,<br>
                                dan peningkatan dalam pemakaian metode.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_latest_blog">
                        <div class="thumb">
                            <img src="/asset/img/latest_blog/pilihan/sosial.jpg" alt="">
                        </div>
                        <div class="content_blog">
                            <div class="blog_meta">
                                <h3>Meningkatkan Interaksi Sosial</h3>
                            </div>
                            <p class="blog_text">
                                mengurangi adanya kesenjangan sosial,<br>dan meningkatkan interaksi guru dengan murid.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_latest_blog_end -->
    @endsection
