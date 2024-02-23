import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ServiceProviderRegisterComponent } from './service-provider-register.component';

describe('ServiceProviderRegisterComponent', () => {
  let component: ServiceProviderRegisterComponent;
  let fixture: ComponentFixture<ServiceProviderRegisterComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ServiceProviderRegisterComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ServiceProviderRegisterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
