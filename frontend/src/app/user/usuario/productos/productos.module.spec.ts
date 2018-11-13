import { ProductosModule } from './productos.module';

describe('ProductosModule', () => {
  let productosModule: ProductosModule;

  beforeEach(() => {
    productosModule = new ProductosModule();
  });

  it('should create an instance', () => {
    expect(productosModule).toBeTruthy();
  });
});
