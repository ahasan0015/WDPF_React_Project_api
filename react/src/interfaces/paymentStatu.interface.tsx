export interface PaymentStatu {
  paymentStatusId: number,
  statusName: string,
}

const paymentStatuDefault: PaymentStatu = {
  paymentStatusId: 0,
  statusName: "",
};

export default paymentStatuDefault;
