# n1ed-editor-bundle
Use the [n1ed](https://n1ed.com) editor in Symfony

This bundle exposes a form field that can be used to display the n1ed editor

Sample brandcodenl_n1editor.yml

```
brandcode_nln1ed_editor:
    includeEditor: true
    apiKey: %env(resolve:N1ED_API_KEY)%
    config:
        framework: "bootstrap4"
        bootstrap4: 
            include: false
            includeToGlobalDoc: false
            rootContains: 'rows'        
        ui:
            activateBootstrapEditorOnFullScreen: true
            iframePopUp: true        
        include:
            css:
                - 'build/app.css'            
            includeCssToGlobalDoc: false