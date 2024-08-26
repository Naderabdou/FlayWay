@title(getSetting('meta_title_', app()->getLocale()))
@description(Str::limit(getSetting('meta_description_', app()->getLocale()), 160))
@keywords(implode(',', getSetting('meta_keywords_en')))
@image(asset('storage/' . getSetting('logo')))