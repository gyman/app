<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('pl', array (
  'validators' => 
  array (
    'This value should be false.' => 'Ta wartość powinna być fałszem.',
    'This value should be true.' => 'Ta wartość powinna być prawdą.',
    'This value should be of type {{ type }}.' => 'Ta wartość powinna być typu {{ type }}.',
    'This value should be blank.' => 'Ta wartość powinna być pusta.',
    'The value you selected is not a valid choice.' => 'Ta wartość powinna być jedną z podanych opcji.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Powinieneś wybrać co najmniej {{ limit }} opcję.|Powinieneś wybrać co najmniej {{ limit }} opcje.|Powinieneś wybrać co najmniej {{ limit }} opcji.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Powinieneś wybrać maksymalnie {{ limit }} opcję.|Powinieneś wybrać maksymalnie {{ limit }} opcje.|Powinieneś wybrać maksymalnie {{ limit }} opcji.',
    'One or more of the given values is invalid.' => 'Jedna lub więcej z podanych wartości jest nieprawidłowa.',
    'This field was not expected.' => 'Tego pola się nie spodziewano.',
    'This field is missing.' => 'Tego pola brakuje.',
    'This value is not a valid date.' => 'Ta wartość nie jest prawidłową datą.',
    'This value is not a valid datetime.' => 'Ta wartość nie jest prawidłową datą i czasem.',
    'This value is not a valid email address.' => 'Ta wartość nie jest prawidłowym adresem email.',
    'The file could not be found.' => 'Plik nie mógł zostać odnaleziony.',
    'The file is not readable.' => 'Nie można odczytać pliku.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Plik jest za duży ({{ size }} {{ suffix }}). Maksymalny dozwolony rozmiar to {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Nieprawidłowy typ mime pliku ({{ type }}). Dozwolone typy mime to {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Ta wartość powinna wynosić {{ limit }} lub mniej.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.|Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.|Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.',
    'This value should be {{ limit }} or more.' => 'Ta wartość powinna wynosić {{ limit }} lub więcej.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.|Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.|Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.',
    'This value should not be blank.' => 'Ta wartość nie powinna być pusta.',
    'This value should not be null.' => 'Ta wartość nie powinna być nullem.',
    'This value should be null.' => 'Ta wartość powinna być nullem.',
    'This value is not valid.' => 'Ta wartość jest nieprawidłowa.',
    'This value is not a valid time.' => 'Ta wartość nie jest prawidłowym czasem.',
    'This value is not a valid URL.' => 'Ta wartość nie jest prawidłowym adresem URL.',
    'The two values should be equal.' => 'Obie wartości powinny być równe.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Plik jest za duży. Maksymalny dozwolony rozmiar to {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Plik jest za duży.',
    'The file could not be uploaded.' => 'Plik nie mógł być wgrany.',
    'This value should be a valid number.' => 'Ta wartość powinna być prawidłową liczbą.',
    'This file is not a valid image.' => 'Ten plik nie jest obrazem.',
    'This is not a valid IP address.' => 'To nie jest prawidłowy adres IP.',
    'This value is not a valid language.' => 'Ta wartość nie jest prawidłowym językiem.',
    'This value is not a valid locale.' => 'Ta wartość nie jest prawidłową lokalizacją.',
    'This value is not a valid country.' => 'Ta wartość nie jest prawidłową nazwą kraju.',
    'This value is already used.' => 'Ta wartość jest już wykorzystywana.',
    'The size of the image could not be detected.' => 'Nie można wykryć rozmiaru obrazka.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Szerokość obrazka jest zbyt duża ({{ width }}px). Maksymalna dopuszczalna szerokość to {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Szerokość obrazka jest zbyt mała ({{ width }}px). Oczekiwana minimalna szerokość to {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Wysokość obrazka jest zbyt duża ({{ height }}px). Maksymalna dopuszczalna wysokość to {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Wysokość obrazka jest zbyt mała ({{ height }}px). Oczekiwana minimalna wysokość to {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Ta wartość powinna być aktualnym hasłem użytkownika.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Ta wartość powinna mieć dokładnie {{ limit }} znak.|Ta wartość powinna mieć dokładnie {{ limit }} znaki.|Ta wartość powinna mieć dokładnie {{ limit }} znaków.',
    'The file was only partially uploaded.' => 'Plik został wgrany tylko częściowo.',
    'No file was uploaded.' => 'Żaden plik nie został wgrany.',
    'No temporary folder was configured in php.ini.' => 'Nie skonfigurowano folderu tymczasowego w php.ini, lub skonfigurowany folder nie istnieje.',
    'Cannot write temporary file to disk.' => 'Nie można zapisać pliku tymczasowego na dysku.',
    'A PHP extension caused the upload to fail.' => 'Rozszerzenie PHP spowodowało błąd podczas wgrywania.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Ten zbiór powinien zawierać {{ limit }} lub więcej elementów.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Ten zbiór powinien zawierać {{ limit }} lub mniej elementów.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Ten zbiór powinien zawierać dokładnie {{ limit }} element.|Ten zbiór powinien zawierać dokładnie {{ limit }} elementy.|Ten zbiór powinien zawierać dokładnie {{ limit }} elementów.',
    'Invalid card number.' => 'Nieprawidłowy numer karty.',
    'Unsupported card type or invalid card number.' => 'Nieobsługiwany rodzaj karty lub nieprawidłowy numer karty.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Nieprawidłowy międzynarodowy numer rachunku bankowego (IBAN).',
    'This value is not a valid ISBN-10.' => 'Ta wartość nie jest prawidłowym numerem ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Ta wartość nie jest prawidłowym numerem ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Ta wartość nie jest prawidłowym numerem ISBN-10 ani ISBN-13.',
    'This value is not a valid ISSN.' => 'Ta wartość nie jest prawidłowym numerem ISSN.',
    'This value is not a valid currency.' => 'Ta wartość nie jest prawidłową walutą.',
    'This value should be equal to {{ compared_value }}.' => 'Ta wartość powinna być równa {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Ta wartość powinna być większa niż {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Ta wartość powinna być większa bądź równa {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ta wartość powinna być identycznego typu {{ compared_value_type }} oraz wartości {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Ta wartość powinna być mniejsza niż {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Ta wartość powinna być mniejsza bądź równa {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Ta wartość nie powinna być równa {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ta wartość nie powinna być identycznego typu {{ compared_value_type }} oraz wartości {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Proporcje obrazu są zbyt duże ({{ ratio }}). Maksymalne proporcje to {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Proporcje obrazu są zbyt małe ({{ ratio }}). Minimalne proporcje to {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Obraz jest kwadratem ({{ width }}x{{ height }}px). Kwadratowe obrazy nie są akceptowane.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Obraz jest panoramiczny ({{ width }}x{{ height }}px). Panoramiczne zdjęcia nie są akceptowane.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Obraz jest portretowy ({{ width }}x{{ height }}px). Portretowe zdjęcia nie są akceptowane.',
    'An empty file is not allowed.' => 'Plik nie może być pusty.',
    'The host could not be resolved.' => 'Nazwa hosta nie została rozpoznana.',
    'This value does not match the expected {{ charset }} charset.' => 'Ta wartość nie pasuje do oczekiwanego zestawu znaków {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'Ta wartość nie jest poprawnym kodem BIC (Business Identifier Code).',
    'This form should not contain extra fields.' => 'Ten formularz nie powinien zawierać dodatkowych pól.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Wgrany plik był za duży. Proszę spróbować wgrać mniejszy plik.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'Token CSRF jest nieprawidłowy. Proszę spróbować wysłać formularz ponownie.',
    'fos_user.username.already_used' => 'Ta nazwa użytkownika jest już zajęta',
    'fos_user.username.blank' => 'Proszę podać nazwę użytkownika',
    'fos_user.username.short' => '[-Inf,Inf]Nazwa użytkownika jest za krótka',
    'fos_user.username.long' => '[-Inf,Inf]Nazwa użytkownika jest za długa',
    'fos_user.email.already_used' => 'Podany email jest zajęty',
    'fos_user.email.blank' => 'Proszę podać adres email',
    'fos_user.email.short' => '[-Inf,Inf]Podany email jest za krótki',
    'fos_user.email.long' => '[-Inf,Inf]Podany email jest za długi',
    'fos_user.email.invalid' => 'Podany adres email jest nieprawidłowy',
    'fos_user.password.blank' => 'Proszę podać hasło',
    'fos_user.password.short' => '[-Inf,Inf]Podane hasło jest za krótkie',
    'fos_user.password.mismatch' => 'Hasła nie pasują do siebie',
    'fos_user.new_password.blank' => 'Proszę podać nowe hasło',
    'fos_user.new_password.short' => '[-Inf,Inf]Podane nowe hasło jest za krótkie',
    'fos_user.current_password.invalid' => 'Podane hasło jest nieprawidłowe',
    'fos_user.group.blank' => 'Proszę podać nazwę',
    'fos_user.group.short' => '[-Inf,Inf]Podana nazwa jest za krótka',
    'fos_user.group.long' => '[-Inf,Inf]Podana nazwa jest za długa',
    'dende_calendar.validation.choose_at_least_one_day_for_weekly' => 'Dla wydarzenia cotygodniowego musisz zaznaczyć chociaż jeden dzień!',
    'dende_calendar.validation.choose_calendar_or_provide_new_name' => 'Wybierz kalendarz lub podaj nazwę, by utworzyć nowy!',
    'dende_calendar.validation.event_title_cant_be_empty' => 'Podaj nazwę wydarzenia!',
    'dende_calendar.validation.cant_convert_weekly_to_single' => 'Nie można zamienić powtarzalnego wydarzenia na pojedyńcze. Wybierz inną metodę',
    'user.email_exists' => 'Inny użytkownik używa już tego adresu email',
    'user.username_exists' => 'Inny użytkownik używa już tej nazwy',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Wystąpił błąd uwierzytelniania.',
    'Authentication credentials could not be found.' => 'Dane uwierzytelniania nie zostały znalezione.',
    'Authentication request could not be processed due to a system problem.' => 'Żądanie uwierzytelniania nie mogło zostać pomyślnie zakończone z powodu problemu z systemem.',
    'Invalid credentials.' => 'Nieprawidłowe dane.',
    'Cookie has already been used by someone else.' => 'To ciasteczko jest używane przez kogoś innego.',
    'Not privileged to request the resource.' => 'Brak uprawnień dla żądania wskazanego zasobu.',
    'Invalid CSRF token.' => 'Nieprawidłowy token CSRF.',
    'Digest nonce has expired.' => 'Kod dostępu wygasł.',
    'No authentication provider found to support the authentication token.' => 'Nie znaleziono mechanizmu uwierzytelniania zdolnego do obsługi przesłanego tokenu.',
    'No session available, it either timed out or cookies are not enabled.' => 'Brak danych sesji, sesja wygasła lub ciasteczka nie są włączone.',
    'No token could be found.' => 'Nie znaleziono tokenu.',
    'Username could not be found.' => 'Użytkownik o podanej nazwie nie istnieje.',
    'Account has expired.' => 'Konto wygasło.',
    'Credentials have expired.' => 'Dane uwierzytelniania wygasły.',
    'Account is disabled.' => 'Konto jest wyłączone.',
    'Account is locked.' => 'Konto jest zablokowane.',
  ),
  'time' => 
  array (
    'diff.ago.year' => 'rok temu|%count% lata temu|%count% lat temu',
    'diff.ago.month' => 'miesiąc temu|%count% miesiące temu|%count% miesięcy temu',
    'diff.ago.day' => 'wczoraj|%count% dni temu|%count% dni temu',
    'diff.ago.hour' => 'godzinę temu|%count% godziny temu|%count% godzin temu',
    'diff.ago.minute' => 'minutę temu|%count% minuty temu|%count% minut temu',
    'diff.ago.second' => 'sekundę temu|%count% sekundy temu|%count% sekund temu',
    'diff.empty' => 'teraz',
    'diff.in.second' => 'za sekundę|za %count% sekundy|za %count% sekund',
    'diff.in.hour' => 'za godzinę|za %count% godziny|za %count% godzin',
    'diff.in.minute' => 'za minutę|za %count% minuty|za %count% minut',
    'diff.in.day' => 'za dzień|za %count% dni|za %count% dni',
    'diff.in.month' => 'za miesiąc|za %count% miesiące|za %count% miesięcy',
    'diff.in.year' => 'za rok|za %count% lata|za %count% lat',
  ),
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'Edytuj grupę',
    'group.show.name' => 'Nazwa grupy',
    'group.new.submit' => 'Utwórz grupę',
    'group.flash.updated' => 'Grupa została zaktualizowana.',
    'group.flash.created' => 'Grupa została utworzona.',
    'group.flash.deleted' => 'Grupa została usunięta.',
    'security.login.username' => 'Nazwa użytkownika',
    'security.login.password' => 'Hasło',
    'security.login.remember_me' => 'Nie wylogowuj mnie',
    'security.login.submit' => 'Zaloguj',
    'profile.show.username' => 'Nazwa użytkownika',
    'profile.show.email' => 'E-mail',
    'profile.edit.submit' => 'Edytuj użytkownika',
    'profile.flash.updated' => 'Zapisano zmiany w profilu.',
    'change_password.submit' => 'Zmień hasło',
    'change_password.flash.success' => 'Hasło zostało zmienione.',
    'registration.check_email' => 'Na adres %email% wysłano wiadomość e-mail. Zawiera ona link, na który należy kliknąć, aby aktywować konto.',
    'registration.confirmed' => 'Gratulacje %username%, potwierdziłeś konto.',
    'registration.back' => 'Powrót do poprzedniej strony.',
    'registration.submit' => 'Zarejestruj',
    'registration.flash.user_created' => 'Stworzono użytkownika.',
    'registration.email.subject' => '__registration.email.subject',
    'registration.email.message' => '__registration.email.message',
    'resetting.check_email' => 'E-mail został wysłany. Zawiera on link do formularza zmiany hasła.
Uwaga: Możesz zresetować hasło tylko jeden raz w ciągu %tokenLifetime% godzin.

Sprawdź swoją skrzynkę pocztową, jeśli jednak nie widzisz wiadomości od nas, sprawdź folder spam lub spróbuj ponownie później.
',
    'resetting.request.username' => 'Nazwa użytkownika lub e-mail',
    'resetting.request.submit' => 'Resetuj hasło',
    'resetting.reset.submit' => 'Zmień hasło',
    'resetting.flash.success' => 'Hasło zostało zresetowane.',
    'resetting.email.subject' => 'Resetowanie hasła',
    'resetting.email.message' => 'Cześć %username%!

Aby zresetować hasło - proszę przejść do %confirmationUrl%

Pozdrawiamy,
Zespół.
',
    'layout.logout' => 'Wyloguj',
    'layout.login' => 'Zaloguj',
    'layout.register' => 'Zarejestruj',
    'layout.logged_in_as' => 'Zalogowano jako %username%',
    'form.group_name' => 'Nazwa grupy',
    'form.username' => 'Nazwa użytkownika',
    'form.email' => 'E-mail',
    'form.current_password' => 'Obecne hasło',
    'form.password' => 'Hasło',
    'form.password_confirmation' => 'Powtórz hasło',
    'form.new_password' => 'Nowe hasło',
    'form.new_password_confirmation' => 'Powtórz hasło',
  ),
  'messages' => 
  array (
    'dende_calendar.flash.event_creation_error' => 'Błąd przy tworzeniu wydarzenia!',
    'dende_calendar.flash.event_update_error' => 'Nie udało się zaktualizować wydarzenia.',
    'dende_calendar.flash.event_created_successfully' => 'Wydarzenie utworzone!',
    'dende_calendar.flash.event_updated_successfully' => 'Wydarzenie zostało zaktualizowane!',
    'dende_calendar.link.back_to_calendar' => 'Powrót do kalendarza',
    'dende_calendar.form.calendar.label' => 'Nazwa kalendarza',
    'dende_calendar.form.calendar.placeholder' => 'utwórz nowy kalendarz',
    'dende_calendar.form.new_calendar_name.label' => 'Nazwa kalendarza do utworzenia',
    'dende_calendar.form.type.label' => 'Rodzaj wydarzenia',
    'dende_calendar.form.type.weekly' => 'co tydzień',
    'dende_calendar.form.type.single' => 'jednorazowo',
    'dende_calendar.form.start_date.label' => 'Data rozpoczęcia',
    'dende_calendar.form.end_date.label' => 'Data zakończenia',
    'dende_calendar.form.duration.label' => 'Czas trwania (minuty)',
    'dende_calendar.form.title.label' => 'Nazwa (krótki opis)',
    'dende_calendar.form.repetition_days.label' => 'Dni tygodnia, w których wydarzenie się powtarza',
    'dende_calendar.form.repetition_days.monday' => 'poniedziałek',
    'dende_calendar.form.repetition_days.tuesday' => 'wtorek',
    'dende_calendar.form.repetition_days.wednesday' => 'środa',
    'dende_calendar.form.repetition_days.thursday' => 'czwartek',
    'dende_calendar.form.repetition_days.friday' => 'piątek',
    'dende_calendar.form.repetition_days.saturday' => 'sobota',
    'dende_calendar.form.repetition_days.sunday' => 'niedziela',
    'dende_calendar.form.submit.label' => 'Dodaj wydarzenie',
    'dende_calendar.form.submit_update.label' => 'Zaktualizuj wydarzenie',
    'dende_calendar.form.delete_occurrence.label' => 'Usuń tylko to wystąpienie',
    'dende_calendar.form.delete_event.label' => 'Usuń całe wydarzenie',
    'dende_calendar.form.method.label' => 'Metoda aktualizacji wydarzenia',
    'dende_calendar.form.method.choice.overwrite' => 'Nadpisz całość',
    'dende_calendar.form.method.choice.nextinclusive' => 'Zaktualizuj to i następne wystąpienia',
    'dende_calendar.form.method.choice.single' => 'Zaktualizuj tylko to wystąpienie',
    'dashboard.actions.new_member' => 'Nowy uczestnik',
    'dashboard.actions.calendar' => 'Kalendarz',
    'dashboard.actions.reports' => 'Raporty',
    'account.register.header_link_register' => 'Rejestracja',
    'account.register.header_or' => 'czy',
    'account.register.header_link_login' => 'logowanie?',
    'account.register.caption' => 'Zarejestruj konto, jeśli go jeszcze nie posiadasz, w przeciwnym razie - zaloguj się',
    'account.register.label.username' => 'Nazwa użytkownika',
    'account.register.label.password' => 'Hasło',
    'account.register.label.password_repeat' => 'Powtórz hasło',
    'account.register.label.email' => 'Adres e-mail',
    'account.register.label.submit' => 'Zarejestruj nowe konto',
    'account.register.required_info' => 'pole jest wymagane',
    'account.login.header_link_login' => 'Logowanie',
    'account.login.header_or' => 'czy',
    'account.login.header_link_register' => 'rejestracja?',
    'account.login.caption' => 'Zaloguj się, jeśli posiadasz już konto, w przeciwnym razie - zarejestruj się',
    'account.login.label.username' => 'Nazwa użytkownika',
    'account.login.label.password' => 'Hasło',
    'account.login.label.submit' => 'Zaloguj się',
    'account.login.required_info' => 'pole jest wymagane',
    'account.login.remember_me' => 'Zapamiętaj mnie',
    'profile.title.your_profile' => 'Twoje konto',
    'profile.title.invoices' => 'Faktury',
    'profile.title.orders' => 'Kupione subskrypcje',
    'profile_menu.caption' => 'Moje konto',
    'profile_menu.label.dashboard' => 'Profil',
    'profile_menu.label.orders' => 'Kupione subskrypcje',
    'profile_menu.label.account' => 'Konto',
    'profile_menu.label.invoice_data' => 'Faktury',
    'profile_menu.label.buy_subscription' => 'Przedłuż abonament',
    'profile.dashboard.caption.account' => 'Informacje o koncie',
    'profile.dashboard.caption.password' => 'Zmiana hasła',
    'profile.dashboard.form.label.button_save' => 'Zapisz',
    'profile.dashboard.form.required' => 'Pole wymagane',
    'account.title.caption' => 'Dane Twojego konta',
    'invoices.title.caption' => 'Wystawione faktury',
    'orders.title.caption' => 'Kupione subskrypcje',
    'orders.table.headers.startDate' => 'Rozpoczęcia',
    'orders.table.headers.endDate' => 'Zakończenie',
    'orders.table.headers.status' => 'Status',
    'orders.table.headers.actions' => 'Akcje',
    'orders.table.actions.reorder' => 'Przedłuż',
    'orders.table.actions.invoice' => 'Faktura',
    'orders.table.footer.total_elements' => 'w sumie: count elementów',
    'user.form.password' => 'Nowe hasło',
    'user.form.password_confirmation' => 'Powtórz nowe hasło',
    'user.profile.notice.success' => 'Wszystko w porządku!',
    'user.notice.profile_registered_succesfuly' => 'Rejestracja się powiodła!',
    'account.login.password_recovery' => 'Przypomnij hasło',
    'account.reset.header' => 'Przypominanie hasła',
    'account.reset.caption' => 'Jeżeli nie pamiętasz swojego hasła, żaden problem! Mamy nadzieję, że pamiętasz choć nazwę swojego użytkownika lub adres email, na który zostało założone konto ;)',
    'Bad credentials' => 'Nieprawidłowa nazwa użytkownika lub hasło',
    'group.edit.submit' => 'Edytuj grupę',
    'group.show.name' => 'Nazwa grupy',
    'group.new.submit' => 'Utwórz grupę',
    'group.flash.updated' => 'Grupa została zaktualizowana',
    'group.flash.created' => 'Grupa została utworzona',
    'group.flash.deleted' => 'Grupa została usunięta',
    'security.login.username' => 'Nazwa użytkownika:',
    'security.login.password' => 'Hasło:',
    'security.login.remember_me' => 'Nie wylogowuj mnie',
    'security.login.submit' => 'Zaloguj',
    'profile.show.username' => 'Nazwa użytkownika',
    'profile.show.email' => 'E-mail',
    'profile.edit.submit' => 'Edytuj użytkownika',
    'profile.flash.updated' => 'Zapisano zmiany w profilu',
    'change_password.submit' => 'Zmień hasło',
    'change_password.flash.success' => 'Hasło zostało zmienione',
    'registration.check_email' => 'Na adres %email% wysłano wiadomość e-mail. Zawiera ona link, na który należy kliknąć, aby aktywować konto.',
    'registration.confirmed' => 'Gratulacje %username%, potwierdziłeś konto.',
    'registration.submit' => 'Zarejestruj',
    'registration.flash.user_created' => 'Stworzono użytkownika',
    'registration.email.subject' => 'Witaj %username%!',
    'registration.email.message' => 'Cześć %username%!

Aby potwierdzić swoje konto - proszę przejść do %confirmationUrl%

Pozdrawiamy,
Zespół.
',
    'resetting.password_already_requested' => 'W przeciągu ostatnich 24 godzin nastąpiła już próba odzyskania hasła.',
    'resetting.check_email' => 'Na adres %email% wysłano wiadomość e-mail. Zawiera ona link w którego należy kliknąć aby zresetować hasło.',
    'resetting.request.invalid_username' => 'Nazwa użytkownika lub e-mail "%username%" nie istnieje.',
    'resetting.request.username' => 'Nazwa użytkownika lub e-mail:',
    'resetting.request.submit' => 'Resetuj hasło',
    'resetting.reset.submit' => 'Zmień hasło',
    'resetting.flash.success' => 'Hasło zostało zresetowane',
    'resetting.email.subject' => 'Witaj %username%!',
    'resetting.email.message' => 'Cześć %username%!

Aby zresetować hasło - proszę przejść do %confirmationUrl%

Pozdrawiamy,
Zespół.
',
    'layout.logout' => 'Wyloguj',
    'layout.login' => 'Zaloguj',
    'layout.register' => 'Zarejestruj',
    'layout.logged_in_as' => 'Zalogowano jako %username%',
    'form.group_name' => 'Nazwa grupy:',
    'form.username' => 'Nazwa użytkownika:',
    'form.email' => 'E-mail:',
    'form.current_password' => 'Obecne hasło:',
    'form.password' => 'Hasło:',
    'form.password_confirmation' => 'Powtórz hasło:',
    'form.new_password' => 'Nowe hasło:',
    'form.new_password_confirmation' => 'Powtórz hasło:',
    'user.profile.there_were_errors' => 'Wystąpiły błędy',
    'account.login.there_were_errors' => 'Wystąpiły błędy',
    'account.reset.enter_new' => 'Podaj nowe hasło (i postaraj się je zapamiętać ;))',
    'account.reset.required_info' => 'pole jest wymagane',
    'user.form.new_password' => 'Nowe hasło',
    'user.form.new_password_confirmation' => 'Powtórz nowe hasło',
    'user.notice.profile_updated_succesfuly' => 'Profil został zaktualizowany',
    'user.user.form.invoice.companyName' => 'Nazwa firmy',
    'user.user.form.invoice.nip' => 'NIP',
    'user.user.form.invoice.street' => 'Ulica',
    'user.user.form.invoice.zipcode' => 'Kod pocztowy',
    'user.user.form.invoice.city' => 'Miasto',
    'user.user.form.invoice.country' => 'Kraj',
    'entry.type.table_header' => 'Typ',
    'entry.event.table_header' => 'Zajęcia',
    'entry.price.table_header' => 'Cena',
    'entry.startDate.table_header' => 'Wejście',
    'entry.endDate.table_header' => 'Wyjście',
    'mailing.contact.subject' => '[gyman.pl] Formularz kontaktowy',
    'mailing.registration_successful.subject' => '[gyman.pl] Zarejestrowałeś u nas nowe konto',
    'mailing.registeredSuccess.para01' => 'Dziękujemy za rejestrację! Wszystko przebiegło w porządku :)',
    'mailing.registeredSuccess.para02' => 'Twoje dane dostępowe',
    'mailing.registeredSuccess.para03' => 'Zapisz lub wydrukuj te wiadomość.',
    'mailing.registeredSuccess.para04' => 'W razie problemów zawsze możesz skorzystać z',
    'mailing.registeredSuccess.username' => 'nazwa użytkownika',
    'mailing.registeredSuccess.password' => 'hasło',
    'mailing.registeredSuccess.link' => 'przypominanie hasła',
    'user.notice.password_resetted_succesfuly' => 'Twoje hasło zostało zmienione! :)',
    'title.welcome.main_page' => 'Gyman.pl',
    'schedule_label' => 'Grafik',
    'address_label' => 'Kontakt',
    'map_label' => 'Dojazd',
    'members.new.sell_voucher_after_creation' => 'Sprzedaj karnet po utworzeniu uczestnika',
    'member.modal.new_user_title' => 'Nowy uczestnik',
    'member.modal.edit_user_title' => 'Edycja uczestnika \'%member_name%\'',
    'member.modal.birthday_label' => 'Data urodzin',
    'member.modal.save_button_label' => 'Zapisz',
    'member.modal.remove_user_checkbox_label' => 'Usuń użytkownika',
    'member.modal.tab.details_label' => 'Szczegóły',
    'member.modal.tab.voucher_label' => 'Karnet',
    'member.modal.tab.history_label' => 'Historia',
    'member.modal.tab.entries_label' => 'Wejścia',
    'member.modal.tab.extras_label' => 'Dodatkowe',
    'member.modal.tab.picture_label' => 'Załaduj',
    'member.modal.tab.camera_label' => 'Kamera',
    'member.modal.make_picture_button_label' => 'Zdjęcie',
    'member.form.firstname.label' => 'Imię',
    'member.form.lastname.label' => 'Nazwisko',
    'member.form.birthdate.label' => 'Data urodzenia',
    'member.form.gender.label' => 'Płeć',
    'member.form.zipcode.label' => 'Kod pocztowy',
    'member.form.phone.label' => 'Telefon',
    'member.form.email.label' => 'Email',
    'member.form.starred.label' => 'Oznacz gwiazdką',
    'member.form.barcode.label' => 'Kod',
    'member.form.belt.label' => 'Kolor pasa',
    'member.form.notes.label' => 'Notatki',
    'member.form.send_invitation' => 'Zaproś',
    'member.type.email.already_registered' => 'Ten email jest już zarejestrowany',
    'member.type.barcode.already_registered' => 'Ten kod jest już zarejestrowany',
    'male' => 'mężczyzna',
    'female' => 'kobieta',
    'choose' => 'wybierz',
    'white' => 'biały',
    'blue' => 'niebieski',
    'purple' => 'purpurowy',
    'brown' => 'brązowy',
    'black' => 'czarny',
    'flash.member_editted.success' => 'Dane uczestnika zostały zaktualizowane!',
    'flash.member_editted.errors' => 'Przy zapisie danych uczestnika coś poszło nie tak :(Prosimy, przejrzyj karty formularza i popraw błędy oznaczone na czerwono.',
    'flash.member_added.success' => 'Dodaliśmy do bazy dane nowego uczestnika!',
    'flash.member_added.errors' => 'Przy zapisie danych uczestnika coś poszło nie tak :(Prosimy, przejrzyj karty formularza i popraw błędy oznaczone na czerwono.',
    'flash.member_search.more_results_than_one_please_specify_query_more' => 'Dla zapytania, które podaleś przy wyszukiwaniu znaleziono więcej uczestników. Postaraj się być bardziej precyzyjnym przy następnym wyszukiwaniu!',
    'flash.entry_closed.success' => 'Wejście zamknięto.',
    'voucher.entries.open' => 'open',
    'entries.form.entry_type.free.label' => 'darmowe',
    'entries.form.entry_type.voucher.label' => 'na karnet',
    'entries.form.entry_type.paid.label' => 'płatne',
    'entries.form.entry_type.credit.label' => 'kredytowe',
    'entries.form.occurrence.label' => 'Dzisiejsze zajęcia',
    'entries.type.voucher' => 'na karnet',
    'entries.type.credit' => 'kredytowe',
    'entries.type.free' => 'darmowe',
    'entries.type.paid' => 'płatne',
    'member_search_form.query' => 'Imię, nazwisko lub numer karnetu',
    'member_search_form.submit' => 'Szukaj',
    'member_search_form.section' => 'Uczestnik należy do sekcji',
    'member_search_form.section.none' => 'wybierz',
    'member_search_form.has_opened_entry' => 'Otwarte wejście',
    'member_search_form.has_opened_entry.null' => 'wszyscy',
    'member_search_form.has_opened_entry.true' => 'tylko z otwartymi wejściami',
    'member_search_form.has_opened_entry.false' => 'tylko bez otwartych wejść',
    'member_search_form.has_voucher' => 'Aktualny karnet',
    'member_search_form.has_voucher.null' => 'wszyscy',
    'member_search_form.has_voucher.true' => 'tylko z aktualnym karnetem',
    'member_search_form.has_voucher.false' => 'tylko bez karnetu',
    'member_search_form.starred' => 'Oznaczenie "gwiazdką"',
    'member_search_form.starred.null' => 'wszyscy',
    'member_search_form.starred.true' => 'tylko oznaczeni gwiazdką',
    'member_search_form.belt' => 'Kolor pasa',
    'member_search_form.belt.none' => 'wybierz',
    'member.form.update_voucher' => 'edytuj',
    'vouchers.actions.table_header' => 'Akcja',
    'update.voucher' => 'zapisz',
    'form.label.firstname' => 'Imię',
    'form.label.lastname' => 'Nazwisko',
    'navigation.menu.dashboard' => 'Panel nawigatora',
    'navigation.menu.members' => 'Uczestnicy',
    'navigation.menu.schedule' => 'Grafik zajęć',
    'navigation.menu.vouchers' => 'Karnety',
    'navigation.menu.entries' => 'Wejścia',
    'navigation.menu.analytics' => 'Analityka',
    'navigation.menu.employees' => 'Pracownicy',
    'navigation.menu.clubs_and_sections' => 'Kluby i sekcje',
    'navigation.menu.payments' => 'Płatności',
    'navigation.menu.dontknow' => '...',
    'members.close_voucher.confirm_alert' => 'Zamknąć aktualny karnet?\\n(Tego nie da się cofnąć!)',
    'member.form.close_voucher' => 'Zamknij karnet',
    'member.form.add_entry' => 'Otwórz nowe wejście',
    'member.form.close_entry' => 'Zamknij wejście',
    'entries.form.start_date.label' => 'Data i godzina wejścia',
    'entries.form.entry_type.label' => 'Rodzaj wejścia',
    'entries.form.price.label' => 'opłata za wejście',
    'entries.form.open_entry.label' => 'Dodaj wejście',
    'vouchers.dates.table_header' => 'Daty ważności',
    'vouchers.startDate.table_header' => 'Ważny od',
    'vouchers.endDate.table_header' => 'Ważny do',
    'vouchers.price.table_header' => 'Opłata',
    'vouchers.entries.table_header' => 'Wejścia',
    'flash.member_has_credit_entries' => '{1} Uczestnik wszedł 1 raz na zajęcia wykorzystując kredyt!<br /> Poniższe wejście zostanie przypisane do karnetu i odliczone od pozostałych wejść. |]1,Inf[ Uczestnik wszedł %creditEntriesCount% razy na zajęcia wykorzystując kredyt!<br /> Poniższe wejścia zostaną przypisane do nowego karnetu i odliczone od pozostałych wejść.',
    'settings.header.title' => 'Ustawienia',
    'roles.ROLE_SUPER_ADMIN' => 'superadministrator',
    'roles.ROLE_ADMIN' => 'administrator',
    'roles.ROLE_USER' => 'użytkownik',
    'dashboard_button' => 'Pulpit nawigatora',
    'open_navigation' => 'Otwórz Menu',
    'notification_caption' => 'Uwaga!',
    'navigation.close' => 'zamknij',
    'navigation.logged_in_as' => 'Zalogowany jako',
    'navigation.edit_profile' => 'Edytuj swój profil',
    'navigation.administration' => 'Administracja',
    'navigation.settings' => 'Ustawienia',
    'navigation.logout' => 'Wyloguj',
    'navigation.menu' => 'Nawigacja',
    'remove_collection_element' => 'usuń',
    'remove_collection_element_confirmation' => 'Czy na pewno usunąć element?',
    'open_settings' => 'ustawienia',
  ),
));


return $catalogue;
