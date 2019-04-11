 <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="/img/female1.png" style="height: 80px; width: 80px" alt="" />
                    </a>
                    <h3>{{ Auth::user()->name }} </h3>
                    <p>{{ Auth::user()->email }} </p>
                    <strong>AD+</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="/assets/adminn/dashboard.html" class="dropdown-item">Dashboard v.1</a>
                                <a href="/assets/adminn/dashboard-2.html" class="dropdown-item">Dashboard v.2</a>
                                <a href="/assets/adminn/analytics.html" class="dropdown-item">Analytics</a>
                                <a href="/assets/adminn/widgets.html" class="dropdown-item">Widgets</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-envelope"></i> <span class="mini-dn">Mailbox</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="/assets/adminn/inbox.html" class="dropdown-item">Inbox</a>
                                <a href="/assets/adminn/view-mail.html" class="dropdown-item">View Mail</a>
                                <a href="/assets/adminn/compose-mail.html" class="dropdown-item">Compose Mail</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-flask"></i> <span class="mini-dn">Interface</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="/assets/adminn/google-map.html" class="dropdown-item">Google Map</a>
                                <a href="/assets/adminn/data-maps.html" class="dropdown-item">Data Maps</a>
                                <a href="/assets/adminn/pdf-viewer.html" class="dropdown-item">Pdf Viewer</a>
                                <a href="/assets/adminn/x-editable.html" class="dropdown-item">X-Editable</a>
                                <a href="/assets/adminn/code-editor.html" class="dropdown-item">Code Editor</a>
                                <a href="/assets/adminn/tree-view.html" class="dropdown-item">Tree View</a>
                                <a href="/assets/adminn/preloader.html" class="dropdown-item">Preloader</a>
                                <a href="/assets/adminn/images-cropper.html" class="dropdown-item">Images Cropper</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">Miscellaneous</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="/assets/adminn/profile.html" class="dropdown-item">Profile</a>
                                <a href="/assets/adminn/contact-client.html" class="dropdown-item">Contact Client</a>
                                <a href="/assets/adminn/contact-client-v.1.html" class="dropdown-item">Contact Client v.1</a>
                                <a href="/assets/adminn/project-list.html" class="dropdown-item">Project List</a>
                                <a href="/assets/adminn/project-details.html" class="dropdown-item">Project Details</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Charts</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown chart-left-menu-std animated flipInX">
                                <a href="/assets/adminn/bar-charts.html" class="dropdown-item">Bar Charts</a>
                                <a href="/assets/adminn/line-charts.html" class="dropdown-item">Line Charts</a>
                                <a href="/assets/adminn/area-charts.html" class="dropdown-item">Area Charts</a>
                                <a href="/assets/adminn/rounded-chart.html" class="dropdown-item">Rounded Charts</a>
                                <a href="/assets/adminn/c3.html" class="dropdown-item">C3 Charts</a>
                                <a href="/assets/adminn/sparkline.html" class="dropdown-item">Sparkline Charts</a>
                                <a href="/assets/adminn/peity.html" class="dropdown-item">Peity Charts</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-table"></i> <span class="mini-dn">Data Tables</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="/assets/adminn/static-table.html" class="dropdown-item">Static Table</a>
                                <a href="/assets/adminn/data-table.html" class="dropdown-item">Data Table</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Forms Elements</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown form-left-menu-std animated flipInX">
                                <a href="/assets/adminn/basic-form-element.html" class="dropdown-item">Basic Elements</a>
                                <a href="/assets/adminn/advance-form-element.html" class="dropdown-item">Advance Elements</a>
                                <a href="/assets/adminn/password-meter.html" class="dropdown-item">Password Meter</a>
                                <a href="/assets/adminn/multi-upload.html" class="dropdown-item">Multi Upload</a>
                                <a href="/assets/adminn/tinymc.html" class="dropdown-item">Text Editor</a>
                                <a href="/assets/adminn/dual-list-box.html" class="dropdown-item">Dual List Box</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-desktop"></i> <span class="mini-dn">App views</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown apps-left-menu-std animated flipInX">
                                <a href="/assets/adminn/notifications.html" class="dropdown-item">Notifications</a>
                                <a href="/assets/adminn/alerts.html" class="dropdown-item">Alerts</a>
                                <a href="/assets/adminn/modals.html" class="dropdown-item">Modals</a>
                                <a href="/assets/adminn/buttons.html" class="dropdown-item">Buttons</a>
                                <a href="/assets/adminn/tabs.html" class="dropdown-item">Tabs</a>
                                <a href="/assets/adminn/accordion.html" class="dropdown-item">Accordion</a>
                                <a href="/assets/adminn/tab-menus.html" class="dropdown-item">Tab Menus</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-files-o"></i> <span class="mini-dn">Pages</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown pages-left-menu-std animated flipInX">
                                <a href="/assets/adminn/login.html" class="dropdown-item">Login</a>
                                <a href="/assets/adminn/register.html" class="dropdown-item">Register</a>
                                <a href="/assets/adminn/captcha.html" class="dropdown-item">Captcha</a>
                                <a href="/assets/adminn/checkout.html" class="dropdown-item">Checkout</a>
                                <a href="/assets/adminn/contact.html" class="dropdown-item">Contacts</a>
                                <a href="/assets/adminn/review.html" class="dropdown-item">Review</a>
                                <a href="/assets/adminn/order.html" class="dropdown-item">Order</a>
                                <a href="/assets/adminn/comment.html" class="dropdown-item">Comment</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>