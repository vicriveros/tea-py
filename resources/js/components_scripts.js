const collapsible_panes = Array.from(document.querySelectorAll('[data-toggle="collapsible_pane"]'));
        window.addEventListener('click', (ev) => {
            const elm = ev.target;

            /*Collapsible panes*/
            if (collapsible_panes.includes(elm)) {
                const selector = elm.getAttribute('data-target');
                let condition = elm.getAttribute('aria-expanded');    
                let arrow = document.getElementsByClassName(selector.substr(1)+'_arrow')[0];   
                let label_cont = document.getElementsByClassName(selector.substr(1)+'_label')[0];    
                let label = condition == 'true' ? 'expandir' : 'colapsar'; 
                let deg = condition == 'true' ? 0 : -180;
                let mHeight = condition == 'true' ? '0px' : '7000px';
                
                collapse_expand(selector, mHeight, condition);
                label_cont.innerHTML =label;
                arrow.style.transform ='rotate('+ deg +'deg)';
            }
            /*Collapsible panes*/
        }, false);

        const collapse_expand = (selector, mHeight, condition) => {
            const targets = Array.from(document.querySelectorAll(selector));
            targets.forEach(target => {
                target.style.maxHeight = mHeight;
            });

            condition = condition == 'true' ? 'false' : 'true';
            document.getElementById(selector.substr(1)).setAttribute('aria-expanded', condition);
        }