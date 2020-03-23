<?php /** @var Page $page */
$page; ?>
<?php $page->addHtmlAttr('lang', 'it') ?>
<?php $page->setTitle('Test - Firelamp') ?>
@{main-header}
<div class="container">
    <section class="team-section text-center my-5">
        <h2 text-lang="it" class="h1-responsive font-weight-bold my-5">Il nostro fantastico team</h2>
        <h2 text-lang="en" class="h1-responsive font-weight-bold my-5">Our amazing team</h2>
        <!-- Section description -->
        <p text-lang="it" class="grey-text w-responsive mx-auto mb-5">Il nostro fantastico team ha costruito una
            piattaforma per sviluppatori di siti web
            e utenti che funziona in un modo particolare</p>
        <p text-lang="en" class="grey-text w-responsive mx-auto mb-5">Our amazing team have built a platform for web
            site developer and
            user that work a particular way</p>
        <div class="row text-center">
            <div class="col-md-4 mb-md-0 mb-5">
                <div class="avatar mx-auto">
                    <a href="<?php echo $page->getHelper()->getPageURL("russo-simone") ?>">
                        <img src="https://uniuyo.edu.ng/eportals/images/user.jpg" class="rounded-circle z-depth-1"
                             alt="Sample avatar">
                    </a>
                </div>
                <h4 class="font-weight-bold dark-grey-text my-4">Russo Simone</h4>
                <h6 text-lang="it" class="text-uppercase grey-text mb-3"><strong>Sviluppatore Sito Web</strong></h6>
                <h6 text-lang="en" class="text-uppercase grey-text mb-3"><strong>Web Site Developer</strong></h6>
                <!--Email-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-email">
                    <i class="fas fa-envelope"></i>
                </a>
                <!--Facebook-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!--Instagram-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-ins">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <div class="col-md-4 mb-md-0 mb-5">
                <div class="avatar mx-auto">
                    <a href="<?php echo $page->getHelper()->getPageURL("pecchio-lorenzo") ?>">
                        <img src="https://uniuyo.edu.ng/eportals/images/user.jpg" class="rounded-circle z-depth-1"
                             alt="Sample avatar">
                    </a>
                </div>
                <h4 class="font-weight-bold dark-grey-text my-4">Pecchio Lorenzo</h4>
                <h6 text-lang="it" class="text-uppercase grey-text mb-3"><strong>Sviluppatore Front-end</strong></h6>
                <h6 text-lang="en" class="text-uppercase grey-text mb-3"><strong>Front-end Developer</strong></h6>
                <!--Email-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-email">
                    <i class="fas fa-envelope"></i>
                </a>
                <!--Facebook-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!--Instagram-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-ins">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <div class="col-md-4">
                <div class="avatar mx-auto">
                    <a href="<?php echo $page->getHelper()->getPageURL("cocero-kevin") ?>">
                        <img src="https://uniuyo.edu.ng/eportals/images/user.jpg" class="rounded-circle z-depth-1"
                             alt="Sample avatar">
                    </a>
                </div>
                <h4 class="font-weight-bold dark-grey-text my-4">Cocero Kevin</h4>
                <h6 text-lang="it" class="text-uppercase grey-text mb-3"><strong>Sviluppatore Front-end</strong></h6>
                <h6 text-lang="en" class="text-uppercase grey-text mb-3"><strong>Front-end Developer</strong></h6>
                <!--Email-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-email">
                    <i class="fas fa-envelope"></i>
                </a>
                <!--Facebook-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!--Instagram-->
                <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-ins">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

        </div>

    </section>
    <div>
        <div class="row"><p text-lang="it" style="text-align: justify">Lorem ipsum dolor sit amet, consectetur
                adipiscing elit.
                Vestibulum consequat ligula consequat, hendrerit purus eget, rhoncus ligula. Quisque lacinia laoreet
                sapien ut tincidunt. Vestibulum rhoncus eros at orci vehicula consequat. Curabitur quis malesuada nisl.
                Nulla elit felis, cursus vitae rhoncus non, sagittis quis diam. Nam a accumsan lacus. Vivamus ac
                malesuada odio. Aliquam eget lacus eu enim tristique hendrerit. Curabitur placerat, mauris vel tempus
                luctus, augue urna tristique augue, eget finibus libero lorem sit amet dui. Cras sollicitudin vehicula
                massa, ac volutpat metus semper vitae. Etiam rhoncus justo purus, et lacinia nulla egestas eu.
                Vestibulum rhoncus maximus orci, vel vehicula ligula lobortis efficitur.

                Mauris mi augue, viverra eu lorem ut, elementum hendrerit mi. Etiam rhoncus odio vitae tempus mollis.
                Sed luctus massa ac dui ultrices, eget mollis urna ultrices. Nulla a mattis velit, vel ullamcorper nibh.
                Nulla tristique vitae sem id viverra. Curabitur ullamcorper hendrerit ex vitae feugiat. Nunc ac eleifend
                magna. Pellentesque ac leo egestas, sollicitudin neque at, vehicula magna. Aliquam at scelerisque nibh.
                Sed et magna elit. Nulla ut sollicitudin nulla. Phasellus blandit, sem nec convallis tristique, lacus
                orci pulvinar lorem, quis suscipit est ex nec libero. Aenean in purus sapien. Sed viverra scelerisque
                mauris in facilisis.

                In nec dapibus lectus. Nullam ornare velit ac enim vehicula facilisis. Nulla pretium purus id augue
                ultricies mattis. Duis placerat neque at egestas volutpat. Quisque vel dolor suscipit, aliquet felis
                quis, blandit tortor. Donec eu consectetur augue. Mauris bibendum eu mi in viverra. Vivamus sed faucibus
                mi. Aliquam pellentesque posuere pulvinar. Phasellus dignissim ullamcorper lorem.

                Aliquam arcu dui, semper ac dignissim sed, ultricies a turpis. Aliquam congue ullamcorper massa, eu
                efficitur justo rutrum vitae. Pellentesque ultricies tempor magna. Mauris suscipit auctor neque eget
                dapibus. Fusce rutrum venenatis lorem eu varius. Proin placerat dictum mauris et ultrices. Pellentesque
                porta ullamcorper pretium. Mauris id mi ligula. Nullam ac lacus sit amet justo faucibus ultrices ac a
                tortor. Morbi et massa vitae felis dictum lacinia non id sapien. Vestibulum at felis rutrum, ullamcorper
                nulla a, pretium massa. Proin eu leo id felis mattis pretium et ac eros. Pellentesque suscipit, odio in
                luctus ultricies, arcu magna faucibus lorem, in finibus nunc urna ac nunc. Aliquam a justo eu sem
                finibus ultricies.

                Nulla mi sem, faucibus nec leo id, cursus feugiat purus. Curabitur auctor nunc in turpis vulputate,
                mattis iaculis lectus aliquet. Morbi at enim ligula. Maecenas nec augue sodales, pellentesque sapien
                vitae, vestibulum diam. Suspendisse a placerat tortor, ac convallis tellus. Aenean ornare condimentum
                imperdiet. Integer ut mauris nisi. Pellentesque a nulla elementum turpis lobortis euismod. Nunc ac arcu
                eget turpis cursus lobortis. Curabitur tincidunt aliquet ante nec tempor.Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Vestibulum consequat ligula consequat, hendrerit purus eget, rhoncus
                ligula. Quisque lacinia laoreet sapien ut tincidunt. Vestibulum rhoncus eros at orci vehicula consequat.
                Curabitur quis malesuada nisl. Nulla elit felis, cursus vitae rhoncus non, sagittis quis diam. Nam a
                accumsan lacus. Vivamus ac malesuada odio. Aliquam eget lacus eu enim tristique hendrerit. Curabitur
                placerat, mauris vel tempus luctus, augue urna tristique augue, eget finibus libero lorem sit amet dui.
                Cras sollicitudin vehicula massa, ac volutpat metus semper vitae. Etiam rhoncus justo purus, et lacinia
                nulla egestas eu. Vestibulum rhoncus maximus orci, vel vehicula ligula lobortis efficitur.

                Mauris mi augue, viverra eu lorem ut, elementum hendrerit mi. Etiam rhoncus odio vitae tempus mollis.
                Sed luctus massa ac dui ultrices, eget mollis urna ultrices. Nulla a mattis velit, vel ullamcorper nibh.
                Nulla tristique vitae sem id viverra. Curabitur ullamcorper hendrerit ex vitae feugiat. Nunc ac eleifend
                magna. Pellentesque ac leo egestas, sollicitudin neque at, vehicula magna. Aliquam at scelerisque nibh.
                Sed et magna elit. Nulla ut sollicitudin nulla. Phasellus blandit, sem nec convallis tristique, lacus
                orci pulvinar lorem, quis suscipit est ex nec libero. Aenean in purus sapien. Sed viverra scelerisque
                mauris in facilisis.

                In nec dapibus lectus. Nullam ornare velit ac enim vehicula facilisis. Nulla pretium purus id augue
                ultricies mattis. Duis placerat neque at egestas volutpat. Quisque vel dolor suscipit, aliquet felis
                quis, blandit tortor. Donec eu consectetur augue. Mauris bibendum eu mi in viverra. Vivamus sed faucibus
                mi. Aliquam pellentesque posuere pulvinar. Phasellus dignissim ullamcorper lorem.

                Aliquam arcu dui, semper ac dignissim sed, ultricies a turpis. Aliquam congue ullamcorper massa, eu
                efficitur justo rutrum vitae. Pellentesque ultricies tempor magna. Mauris suscipit auctor neque eget
                dapibus. Fusce rutrum venenatis lorem eu varius. Proin placerat dictum mauris et ultrices. Pellentesque
                porta ullamcorper pretium. Mauris id mi ligula. Nullam ac lacus sit amet justo faucibus ultrices ac a
                tortor. Morbi et massa vitae felis dictum lacinia non id sapien. Vestibulum at felis rutrum, ullamcorper
                nulla a, pretium massa. Proin eu leo id felis mattis pretium et ac eros. Pellentesque suscipit, odio in
                luctus ultricies, arcu magna faucibus lorem, in finibus nunc urna ac nunc. Aliquam a justo eu sem
                finibus ultricies.

                Nulla mi sem, faucibus nec leo id, cursus feugiat purus. Curabitur auctor nunc in turpis vulputate,
                mattis iaculis lectus aliquet. Morbi at enim ligula. Maecenas nec augue sodales, pellentesque sapien
                vitae, vestibulum diam. Suspendisse a placerat tortor, ac convallis tellus. Aenean ornare condimentum
                imperdiet. Integer ut mauris nisi. Pellentesque a nulla elementum turpis lobortis euismod. Nunc ac arcu
                eget turpis cursus lobortis. Curabitur tincidunt aliquet ante nec tempor.Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Vestibulum consequat ligula consequat, hendrerit purus eget, rhoncus
                ligula. Quisque lacinia laoreet sapien ut tincidunt. Vestibulum rhoncus eros at orci vehicula consequat.
                Curabitur quis malesuada nisl. Nulla elit felis, cursus vitae rhoncus non, sagittis quis diam. Nam a
                accumsan lacus. Vivamus ac malesuada odio. Aliquam eget lacus eu enim tristique hendrerit. Curabitur
                placerat, mauris vel tempus luctus, augue urna tristique augue, eget finibus libero lorem sit amet dui.
                Cras sollicitudin vehicula massa, ac volutpat metus semper vitae. Etiam rhoncus justo purus, et lacinia
                nulla egestas eu. Vestibulum rhoncus maximus orci, vel vehicula ligula lobortis efficitur.

                Mauris mi augue, viverra eu lorem ut, elementum hendrerit mi. Etiam rhoncus odio vitae tempus mollis.
                Sed luctus massa ac dui ultrices, eget mollis urna ultrices. Nulla a mattis velit, vel ullamcorper nibh.
                Nulla tristique vitae sem id viverra. Curabitur ullamcorper hendrerit ex vitae feugiat. Nunc ac eleifend
                magna. Pellentesque ac leo egestas, sollicitudin neque at, vehicula magna. Aliquam at scelerisque nibh.
                Sed et magna elit. Nulla ut sollicitudin nulla. Phasellus blandit, sem nec convallis tristique, lacus
                orci pulvinar lorem, quis suscipit est ex nec libero. Aenean in purus sapien. Sed viverra scelerisque
                mauris in facilisis.

                In nec dapibus lectus. Nullam ornare velit ac enim vehicula facilisis. Nulla pretium purus id augue
                ultricies mattis. Duis placerat neque at egestas volutpat. Quisque vel dolor suscipit, aliquet felis
                quis, blandit tortor. Donec eu consectetur augue. Mauris bibendum eu mi in viverra. Vivamus sed faucibus
                mi. Aliquam pellentesque posuere pulvinar. Phasellus dignissim ullamcorper lorem.

                Aliquam arcu dui, semper ac dignissim sed, ultricies a turpis. Aliquam congue ullamcorper massa, eu
                efficitur justo rutrum vitae. Pellentesque ultricies tempor magna. Mauris suscipit auctor neque eget
                dapibus. Fusce rutrum venenatis lorem eu varius. Proin placerat dictum mauris et ultrices. Pellentesque
                porta ullamcorper pretium. Mauris id mi ligula. Nullam ac lacus sit amet justo faucibus ultrices ac a
                tortor. Morbi et massa vitae felis dictum lacinia non id sapien. Vestibulum at felis rutrum, ullamcorper
                nulla a, pretium massa. Proin eu leo id felis mattis pretium et ac eros. Pellentesque suscipit, odio in
                luctus ultricies, arcu magna faucibus lorem, in finibus nunc urna ac nunc. Aliquam a justo eu sem
                finibus ultricies.

                Nulla mi sem, faucibus nec leo id, cursus feugiat purus. Curabitur auctor nunc in turpis vulputate,
                mattis iaculis lectus aliquet. Morbi at enim ligula. Maecenas nec augue sodales, pellentesque sapien
                vitae, vestibulum diam. Suspendisse a placerat tortor, ac convallis tellus. Aenean ornare condimentum
                imperdiet. Integer ut mauris nisi. Pellentesque a nulla elementum turpis lobortis euismod. Nunc ac arcu
                eget turpis cursus lobortis. Curabitur tincidunt aliquet ante nec tempor.Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Vestibulum consequat ligula consequat, hendrerit purus eget, rhoncus
                ligula. Quisque lacinia laoreet sapien ut tincidunt. Vestibulum rhoncus eros at orci vehicula consequat.
                Curabitur quis malesuada nisl. Nulla elit felis, cursus vitae rhoncus non, sagittis quis diam. Nam a
                accumsan lacus. Vivamus ac malesuada odio. Aliquam eget lacus eu enim tristique hendrerit. Curabitur
                placerat, mauris vel tempus luctus, augue urna tristique augue, eget finibus libero lorem sit amet dui.
                Cras sollicitudin vehicula massa, ac volutpat metus semper vitae. Etiam rhoncus justo purus, et lacinia
                nulla egestas eu. Vestibulum rhoncus maximus orci, vel vehicula ligula lobortis efficitur.

                Mauris mi augue, viverra eu lorem ut, elementum hendrerit mi. Etiam rhoncus odio vitae tempus mollis.
                Sed luctus massa ac dui ultrices, eget mollis urna ultrices. Nulla a mattis velit, vel ullamcorper nibh.
                Nulla tristique vitae sem id viverra. Curabitur ullamcorper hendrerit ex vitae feugiat. Nunc ac eleifend
                magna. Pellentesque ac leo egestas, sollicitudin neque at, vehicula magna. Aliquam at scelerisque nibh.
                Sed et magna elit. Nulla ut sollicitudin nulla. Phasellus blandit, sem nec convallis tristique, lacus
                orci pulvinar lorem, quis suscipit est ex nec libero. Aenean in purus sapien. Sed viverra scelerisque
                mauris in facilisis.

                In nec dapibus lectus. Nullam ornare velit ac enim vehicula facilisis. Nulla pretium purus id augue
                ultricies mattis. Duis placerat neque at egestas volutpat. Quisque vel dolor suscipit, aliquet felis
                quis, blandit tortor. Donec eu consectetur augue. Mauris bibendum eu mi in viverra. Vivamus sed faucibus
                mi. Aliquam pellentesque posuere pulvinar. Phasellus dignissim ullamcorper lorem.

                Aliquam arcu dui, semper ac dignissim sed, ultricies a turpis. Aliquam congue ullamcorper massa, eu
                efficitur justo rutrum vitae. Pellentesque ultricies tempor magna. Mauris suscipit auctor neque eget
                dapibus. Fusce rutrum venenatis lorem eu varius. Proin placerat dictum mauris et ultrices. Pellentesque
                porta ullamcorper pretium. Mauris id mi ligula. Nullam ac lacus sit amet justo faucibus ultrices ac a
                tortor. Morbi et massa vitae felis dictum lacinia non id sapien. Vestibulum at felis rutrum, ullamcorper
                nulla a, pretium massa. Proin eu leo id felis mattis pretium et ac eros. Pellentesque suscipit, odio in
                luctus ultricies, arcu magna faucibus lorem, in finibus nunc urna ac nunc. Aliquam a justo eu sem
                finibus ultricies.


                Nulla mi sem, faucibus nec leo id, cursus feugiat purus. Curabitur auctor nunc in turpis vulputate,
                mattis iaculis lectus aliquet. Morbi at enim ligula. Maecenas nec augue sodales, pellentesque sapien
                vitae, vestibulum diam. Suspendisse a placerat tortor, ac convallis tellus. Aenean ornare condimentum
                imperdiet. Integer ut mauris nisi. Pellentesque a nulla elementum turpis lobortis euismod. Nunc ac arcu
                eget turpis cursus lobortis. Curabitur tincidunt aliquet ante nec tempor.

            <p text-lang="en" style="text-align: justify">Where does it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does
                it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does
                it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does
                it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does
                it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

        </div>
    </div>
</div>
@{footer}