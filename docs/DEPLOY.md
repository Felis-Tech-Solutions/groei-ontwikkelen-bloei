# Deployen naar TransIP

Elke push naar `master` wordt via GitHub Actions automatisch naar de TransIP-webhosting
gezet (zie `.github/workflows/deploy.yml`). De workflow:

1. installeert de Composer-pakketten (zonder dev-pakketten);
2. bouwt de CSS/JS met Vite (`yarn build`);
3. zet de bestanden met `rsync` over SSH op de server;
4. vernieuwt de Laravel- en Statamic-caches.

## Wat wel en niet wordt overgezet

**Code** gaat altijd mee: templates (`resources/views`), blueprints, CSS/JS, config, enz.

**Content** blijft op de server en wordt nooit overschreven of verwijderd:
`content/`, `users/`, `public/assets/`, `resources/forms/`, `storage/` en `.env`.
De volledige lijst staat in `.github/deploy-exclude.txt`.

Gevolgen:

- Teksten, pagina's, diensten en afbeeldingen pas je aan in het Statamic-dashboard op de
  live site (`/cp`).
- Nieuwe velden of secties (blueprints) en templates maak je lokaal in de code en push je
  naar `master`. **Pas blueprints niet aan via het dashboard op de live site**: de
  volgende deploy zet ze terug naar de versie in Git.
- Content die je lokaal aanpast, komt niet automatisch op de live site.

## Eenmalige inrichting

### 1. SSH-sleutel voor GitHub

Maak op je eigen computer een aparte sleutel zonder wachtwoord:

```bash
ssh-keygen -t ed25519 -C "github-deploy" -f gob_deploy -N ""
```

Voeg de inhoud van `gob_deploy.pub` toe in het TransIP-controlepaneel bij
**Webhosting → SSH** (of zet hem op de server in `~/.ssh/authorized_keys`).

Haal de vingerafdruk van de server op (vul je eigen SSH-host in):

```bash
ssh-keyscan JOUW-SSH-HOST
```

### 2. Waar de site op de server staat

De site draait op `groek0.ssh.transip.me` (gebruiker `groeiontwikkelenbloeinl`):

```text
~/www/                <- DEPLOY_PATH (hier staan artisan, content/, .env, ...)
~/www/public/         <- wordt door TransIP als website geserveerd
```

`~/www` was eerder een git-checkout die met `git pull` werd bijgewerkt. Doe dat niet meer
zodra de workflow aan staat: rsync is dan de enige manier om code bij te werken. Live
content-wijzigingen zie je daar dus in `git status` als gewijzigde bestanden; dat is normaal.

Controleer ook dat op de server een `.env` staat met in elk geval `APP_ENV=production`,
`APP_DEBUG=false`, een `APP_KEY` en de juiste `APP_URL`.

### 3. Secrets en variabelen in GitHub

Ga in de repository naar **Settings → Environments** en maak een environment
`production`. Voeg daar toe:

| Secret | Waarde |
| --- | --- |
| `SSH_HOST` | De SSH-host uit het TransIP-controlepaneel |
| `SSH_USER` | De SSH-gebruikersnaam |
| `SSH_PRIVATE_KEY` | Inhoud van `gob_deploy` (de privésleutel) |
| `SSH_KNOWN_HOSTS` | Uitvoer van `ssh-keyscan` |
| `DEPLOY_PATH` | Map met `artisan`, relatief aan je home (bijv. `groei-app`) of absoluut |

| Variabele | Waarde |
| --- | --- |
| `PHP_VERSION` | Dezelfde PHP-versie als in TransIP (bijv. `8.3`) |
| `DEPLOY_ENABLED` | Pas op `true` zetten na een geslaagde proefdraai |
| `PHP_BIN` | Optioneel: PHP-commando op de server (standaard `php`) |
| `SSH_PORT` | Optioneel: SSH-poort (standaard `22`) |

### 4. Proefdraai

Ga naar **Actions → Deploy naar TransIP → Run workflow** en laat **Proefdraai** aangevinkt.
In de log van de stap *Bestanden uploaden* zie je per bestand wat er zou veranderen;
regels met `*deleting` worden verwijderd. Er wordt niets geüpload.

Ziet dat er goed uit, zet dan `DEPLOY_ENABLED` op `true`. Vanaf dan gaat elke push naar
`master` automatisch live. Handmatig deployen kan via **Run workflow** met Proefdraai uit.

## Lokaal ontwikkelen op Windows

Sommige bestandsnamen in `public/assets` zijn erg lang. Zet vóór het clonen:

```bash
git config --global core.longpaths true
```
