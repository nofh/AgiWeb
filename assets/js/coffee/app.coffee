init = ( id ) ->
    # menu actif
    # activer le radio
    $( '#' + id ).prop( 'checked', true)
    # nettoyer le concerne
    $( '#form_concerne' ).empty()
    # afficher le nouveau concerne
    html = concerne_html( id )
    $( '#form_concerne' ).append( html )

concerne_html = ( id ) ->
    switch id
        when 'type_form_infos'
            html = "<select>
                <option value='web'>Création de sites web</option>
                <option value='gestion'>Création de logiciels de gestion</option>
                <option value='hebergement'>L'hébergement</option>
                <option value='Autre'>Autres</option>
            </select>"
        when 'type_form_devis'
            html = "<select>
                <option value='web'>Devis de sites web</option>
                <option value='gestion'>Devis de logiciels de gestion</option>
                <option value='hebergement'>Devis hébergement</option>
                <option value='Autre'>Autres</option>
            </select>"
        when 'type_form_suivit'
            html = "<select>
                <option value='web'>Avancement du projet ?</option>
                <option value='gestion'>Demande de modifications</option>
                <option value='hebergement'>Envoi d'informations ( texte, images, ... )</option>
                <option value='Autre'>Autres</option>
            </select>"
    html

jQuery ->
    # infos par defaut
    init( 'type_form_infos' )
    # changement au click sur radio
    for id in [ 'type_form_infos', 'type_form_devis', 'type_form_suivit' ]
        $( '#' + id ).click ->
            init( this.id )
            return
    return


