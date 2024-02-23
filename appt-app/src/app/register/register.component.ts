import { Component } from '@angular/core';
import { UserRegisterComponent } from '../user-register/user-register.component';
import { ServiceProviderRegisterComponent } from '../service-provider-register/service-provider-register.component';
import { NgIf } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [UserRegisterComponent, ServiceProviderRegisterComponent, NgIf, FormsModule],
  templateUrl: './register.component.html',
  styleUrl: './register.component.scss'
})
export class RegisterComponent {
  registrationType: string = 'user';

  setRegistrationType(type: string): void {
    this.registrationType = type;
  }
}
