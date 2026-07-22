<section class="section page-hero contact-hero">
        <div class="container contact-hero-grid">
          <div class="page-hero-copy">
            <p class="eyebrow" data-i18n="contact.hero.eyebrow">Kapcsolat</p>
            <h1 data-i18n="contact.hero.heading" data-i18n-html>
              Mondd el az<br />
              elképzelésed.<br />
              <span>Segítünk.</span>
            </h1>
            <p class="lead" data-i18n="contact.hero.text">
              Írd meg, milyen munkaruhára, darabszámra és emblémázásra van
              szükséged. Röviden átnézzük az igényeket, és segítünk a megfelelő
              termék, márka és technológia kiválasztásában.
            </p>
          </div>

          <aside class="contact-summary reveal" aria-label="Kapcsolati adatok">
            <img
              class="contact-summary-logo"
              src="/assets/images/home/logo.v1.png"
              alt=""
              aria-hidden="true"
            />
            <div class="contact-summary-item">
              <span data-i18n="contact.hero.emailLabel">Email</span>
              <a href="mailto:iroda@drwork.hu">iroda@drwork.hu</a>
            </div>
            <div class="contact-summary-item">
              <span data-i18n="contact.hero.phoneLabel">Telefon</span>
              <a href="tel:+36704515370">+36704515370</a>
            </div>
            <div class="contact-summary-item">
              <span data-i18n="contact.hero.addressLabel">Cím</span>
              <p data-i18n="contact.hero.address">6400 Kiskunhalas, Kéve utca 26.</p>
            </div>
            <p class="contact-summary-note" data-i18n="contact.hero.formIntro">
              Írd meg az elképzelésed, mi pedig segítünk a következő lépésben.
            </p>
          </aside>
        </div>
      </section>

      <section class="section contact-section" id="ajanlatkeres">
        <div class="container contact-grid">
          <div class="contact-form-card reveal">
            <p class="eyebrow" data-i18n="contact.form.eyebrow">Ajánlatkérés</p>
            <h2 class="section-title" data-i18n="contact.form.heading">Írd meg, mire van szükséged</h2>
            <form class="contact-form" action="/wp-json/drwork/v1/contact" method="post" data-contact-form novalidate>
              <label class="form-honeypot" aria-hidden="true">
                <span>Weboldal</span>
                <input type="text" name="website" tabindex="-1" autocomplete="off" />
              </label>
              <div class="form-row">
                <label>
                  <span data-i18n="contact.form.name">Név</span>
                  <input type="text" name="name" autocomplete="name" required />
                </label>
                <label>
                  <span data-i18n="contact.form.company">Cégnév</span>
                  <input type="text" name="company" autocomplete="organization" />
                </label>
              </div>

              <div class="form-row">
                <label>
                  <span data-i18n="contact.form.email">Email</span>
                  <input type="email" name="email" autocomplete="email" required />
                </label>
                <label>
                  <span data-i18n="contact.form.phone">Telefonszám</span>
                  <input type="tel" name="phone" autocomplete="tel" />
                </label>
              </div>

              <div class="form-row">
                <label>
                  <span data-i18n="contact.form.product">Milyen ruhára van szükség?</span>
                  <select name="product">
                    <option value="" data-i18n="contact.form.productPlaceholder">Válassz típust</option>
                    <option>Póló / galléros póló</option>
                    <option>Pulóver / softshell</option>
                    <option>Mellény / kabát</option>
                    <option>Munkanadrág / munkaruha szett</option>
                    <option>Még nem tudom pontosan</option>
                  </select>
                </label>
                <label>
                  <span data-i18n="contact.form.quantity">Darabszám</span>
                  <input type="text" name="quantity" placeholder="pl. 25 db" data-i18n-placeholder="contact.form.quantityPlaceholder" />
                </label>
              </div>

              <label>
                <span data-i18n="contact.form.message">Üzenet</span>
                <textarea
                  name="message"
                  rows="6"
                  placeholder="Írd le röviden a projektet, a logó helyét, a határidőt vagy bármilyen fontos részletet."
                  data-i18n-placeholder="contact.form.messagePlaceholder"
                  required
                ></textarea>
              </label>

              <label class="form-consent">
                <input type="checkbox" name="privacy_consent" value="1" required />
                <span data-i18n="contact.form.consent" data-i18n-html>
                  Elolvastam és elfogadom az
                  <a href="/adatkezeles.html" target="_blank" rel="noopener">
                    adatkezelési tájékoztatót
                  </a>, és hozzájárulok, hogy a Dr.Work kapcsolatba lépjen velem az ajánlatkéréssel kapcsolatban.
                </span>
              </label>

              <button class="btn btn-primary" type="submit" data-i18n="contact.form.submit" data-i18n-html>
                Ajánlatot kérek
                <span aria-hidden="true">›</span>
              </button>
              <p class="form-status" data-form-status role="alert" hidden></p>
            </form>
          </div>

          <aside class="contact-help reveal">
            <p class="eyebrow" data-i18n="contact.help.eyebrow">Gyorsabb ajánlat</p>
            <h2 class="section-title" data-i18n="contact.help.heading">Ezeket érdemes megírni</h2>
            <div class="contact-help-list">
              <article>
                <img src="/assets/images/icons/ikon-6.png" alt="" />
                <div>
                  <h3 data-i18n="contact.help.product.title">Termék típusa</h3>
                  <p data-i18n="contact.help.product.text">Póló, pulóver, mellény, kabát vagy komplett munkaruha.</p>
                </div>
              </article>
              <article>
                <img src="/assets/images/icons/ikon-7.png" alt="" />
                <div>
                  <h3 data-i18n="contact.help.quantity.title">Darabszám</h3>
                  <p data-i18n="contact.help.quantity.text">Elég egy körülbelüli mennyiség, később pontosítjuk.</p>
                </div>
              </article>
              <article>
                <img src="/assets/images/icons/ikon-2.png" alt="" />
                <div>
                  <h3 data-i18n="contact.help.logo.title">Logó helye</h3>
                  <p data-i18n="contact.help.logo.text">Bal mellkas, hát, ujj vagy több elhelyezés egyszerre.</p>
                </div>
              </article>
              <article>
                <img src="/assets/images/icons/ikon-10.png" alt="" />
                <div>
                  <h3 data-i18n="contact.help.deadline.title">Határidő</h3>
                  <p data-i18n="contact.help.deadline.text">Írd meg, ha rendezvényhez vagy konkrét dátumhoz kell.</p>
                </div>
              </article>
            </div>
          </aside>
        </div>
      </section>
