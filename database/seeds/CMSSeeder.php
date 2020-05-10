<?php

use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms')->insert([[
            'name' => 'Quiénes Somos',
            'description' => '<section id="shotcode-1" class="shotcode-1 text-center-xs text-center-sm">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="heading heading-4">
                                    <div class="heading-bg heading-right">
                                        <p class="mb-0">All About Yellow Hats</p>
                                        <h2>Our Story</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h3 class="color-heading mb-sm font-18">Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA.</h3>
                        <p class="mb-60">Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly. Today Yellow Hats has over 4,000 professionals on its payroll. The company is active in Middle East, CIS and Europe. Yellow Hats has a team of specialists capable of maximizing the result and delivering projects of any complexity and scope. Our employees are acclaimed experts in such areas as project.</p>
                        <a class="btn btn-secondary mb-30-xs" href="#">our services</a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1">
                                <div class="feature-icon">
                                    <i class="lnr lnr-calendar-full"></i>
                                </div>
                                <h4 class="text-uppercase">Always Available</h4>
                                <p>all construction sites open for visitors, with 24/7 video surveillance being conducted at all objects</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1">
                                <div class="feature-icon">
                                    <i class="lnr lnr-briefcase"></i>
                                </div>
                                <h4 class="text-uppercase">Qualified Agents</h4>
                                <p>We have a team of specialists capable of maximizing the result and delivering the projects</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1 mb-0">
                                <div class="feature-icon">
                                    <i class="lnr lnr-database"></i>
                                </div>
                                <h4 class="text-uppercase">Fair Prices</h4>
                                <p>you can be 100% sure that it will be delivered right on time, within the set budget limits</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 feature  feature-1 mb-0">
                                <div class="feature-icon">
                                    <i class="lnr lnr-cart"></i>
                                </div>
                                <h4 class="text-uppercase">Best Offers</h4>
                                <p>All aspects of the operations being transparent and clear for clients and partners</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>',
            'url' => 'quienes-somos',
            'active' => true,
            'title' => 'Quiénes Somos',
            'seo_description' => 'SEO SEO SEO',
            'keywords' => 'SEO, SEO, SEO',
        ], [
            'name' => 'Servicios',
            'description' => '<section id="service-7" class="service service-7">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="heading heading-2 text-center">
                            <div class="heading-bg">
                                <p class="mb-0">what we can do ?</p>
                                <h2>our services</h2>
                            </div>
                            <p class="mb-0 mt-md">Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 service-block">
                                <div class="service-img">
                                    <img src="assets/images/services/small/1.jpg" alt="icons"/>
                                </div>
                                <div class="service-content">
                                    <div class="service-desc">
                                        <h4>Tiling &amp; Painting</h4>
                                        <p>Tiling is an effective way to add elegance & style to any bath or kitchen Yellow Hats Remodeling specializes in tile installation and works directly with each homeowner.</p>
                                        <a class="read-more" href="#"><i class="fa fa-plus"></i>
                                            <span>read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-3 service-block">
                                <div class="service-img">
                                    <img src="assets/images/services/small/2.jpg" alt="icons"/>
                                </div>
                                <div class="service-content">
                                    <div class="service-desc">
                                        <h4>Renovations</h4>
                                        <p>Yellow Hats has full service renovation expertise, we are equipped with the right tools and people to handle projects of all sizes & provide high quality renovation works.</p>
                                        <a class="read-more" href="#"><i class="fa fa-plus"></i>
                                            <span>read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-3 service-block">
                                <div class="service-img">
                                    <img src="assets/images/services/small/3.jpg" alt="icons"/>
                                </div>
                                <div class="service-content">
                                    <div class="service-desc">
                                        <h4>Design &amp; Build</h4>
                                        <p>Yellow Hats aim to eliminate the task of dividing your project between different architecture and construction company as we offers design and build services for you.</p>
                                        <a class="read-more" href="#"><i class="fa fa-plus"></i>
                                            <span>read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-3 service-block">
                                <div class="service-img">
                                    <img src="assets/images/services/small/4.jpg" alt="icons"/>
                                </div>
                                <div class="service-content">
                                    <div class="service-desc">
                                        <h4>Consulting</h4>
                                        <p>Whether you know exactly how really you want your new home to be or just looking for new ideas to build your new house, offers priceless resources to help bring those ideas to life.</p>
                                        <a class="read-more" href="#"><i class="fa fa-plus"></i>
                                            <span>read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <div class="cleafix mb-150">
        </div>',
            'url' => 'servicios',
            'active' => true,
            'title' => 'Servicios',
            'seo_description' => 'SEO SEO SEO',
            'keywords' => 'SEO, SEO, SEO',
        ], [
            'name' => 'Condiciones de uso',
            'description' => '',
            'url' => 'condiciones-de-uso',
            'active' => true,
            'title' => 'Condiciones de uso',
            'seo_description' => 'SEO SEO SEO',
            'keywords' => 'SEO, SEO, SEO',
        ]]);
    }
}
