/* ── Protection anti-robots : téléphone et e-mail ──────────
   Aucun des deux n'apparaît en clair dans le HTML ni le JS.
   Le numéro et l'adresse sont reconstitués par addition
   de fragments dans un ordre différent de l'affichage.
─────────────────────────────────────────────────────────── */
(function () {

  /* Fragments du téléphone (ordre découpé) */
  var t1 = '(514) ', t3 = '1-4', t5 = '0', t2 = '62', t4 = '31';
  var tel = t1 + t2 + ' ' + t3 + t4 + ' ' + t5;   

  /* Fragments de l'e-mail */
  var m3 = 'ino.', m1 = 'va', m5 = 'her', m2 = 'lent', m6 = '@gmail', m4 = 'lerc', m7 = '.com';
  var mail = m1 + m2 + m3 + m4 + m5 + m6 + m7;

  /* ── Téléphone ── */
  var telEl = document.getElementById('tel-display');
  if (telEl) {
    telEl.textContent = tel; // Affiche "(514) 62 1-431 0"
    
    // Au clic, on nettoie la variable 'tel' pour le protocole tel:
    telEl.addEventListener('click', function () {
      var telClean = tel.replace(/[\s()-\s]/g, ''); // Enlève espaces, parenthèses et tirets automatiquement
      window.location.href = 'tel:' + telClean;
    });
  }

  /* ── E-mail ── */
  var mailEl = document.getElementById('mail-display');
  if (mailEl) {
    mailEl.textContent = mail;
    mailEl.addEventListener('click', function () {
      window.location.href = 'mailto:' + mail;
    });
  }

})();