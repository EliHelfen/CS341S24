import { Component } from '@angular/core';
import { Router, RouterOutlet } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { RegisterComponent } from './register/register.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, LoginComponent, HeaderComponent, FooterComponent, RegisterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss',
  template: '<router-outlet></router-outlet>',
})
export class AppComponent {
  title = 'Hello world!';
}
